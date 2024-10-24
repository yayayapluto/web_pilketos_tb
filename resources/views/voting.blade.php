@extends('layouts.voting')

@section('title', 'Welcome')

@section('header')
<x-client_navbar></x-client_navbar>

    <script script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <style>
        .containerkanidat {
            box-shadow: 0px 0px 0px 0px #0083D4;
            -webkit-box-shadow: 0px 0px 0px 0px #0083D4;
            -moz-box-shadow: 0px 0px 0px 0px #0083D4;
            transition: box-shadow 0.3s ease-in-out;
        }

        .containerkanidat:hover {
            box-shadow: -12px 13px 0px 0px #0083D4;
            -webkit-box-shadow: -12px 13px 0px 0px #0083D4;
            -moz-box-shadow: -12px 13px 0px 0px #0083D4;
            cursor: pointer;
        }

        .selected {
            box-shadow: -12px 13px 0px 0px #00c724ca;
            -webkit-box-shadow: -12px 13px 0px 0px #00c724ca;
            -moz-box-shadow: -12px 13px 0px 0px #00c724ca;
        }

        .selected:hover {
            box-shadow: -12px 13px 0px 0px #00c724ca;
            -webkit-box-shadow: -12px 13px 0px 0px #00c724ca;
            -moz-box-shadow: -12px 13px 0px 0px #00c724ca;
            cursor: pointer;
        }

        @media screen and (max-width: 1000px) {
            #headertextvoting {
                margin-top: 90px;
            }
            
        }
    </style>

@endsection

@section('content')

    <form>
        @csrf
        <div style="background-color:#0099FF;height:250px; width:100%;">
            <div style="margin-top: 140px; width:65%;margin-left:18%">
                <div style="width: 100%; text-align:center;">
                    <label style="font-size: 35px;font-weight:bold;color:white;" for="nisn" class="nisnlabel">NISN anda:</label><br>
                </div>

                <input style="width:100%; border:none; height:35px;border-radius:8px;padding:10px;" type="number"
                    id="nisn" name="nisn" required>
            </div>
        </div>
        <div class="container-fluid"
            style="margin-top:0px;background-image: url('../../assets/logoTB/Screenshot 2024-10-16 135500.png'); padding-bottom: 50px; background-repeat: no-repeat;
background-size: contain;">

            <div style="display:flex; justify-content:center; align-items:center;margin-top:70px ">
                <div style="position: absolute; top:0; margin-top:300px">

                    <a style="font-size: 35px;font-weight:bold;color:white;">Kandidat</a>

                </div>
            </div>

            <div id="containervoting1" class="container mt-5">

                <div class="row justify-content-center " style="margin-top: 50px; padding-bottom: 10px;">
                    @foreach ($candidates as $candidate)
                        <div class="col-md-4" style="height: 550px">
                            <div class="card text-center containerkanidat" style="height: 490px;" data-candidate="{{ $candidate->candidate_id }}"
                                onclick="selectCandidate(this)">
                                <img style="height: 285px; width:75%;object-fit:cover; margin-top:15px;border-radius:15px;margin-left:50px"
                                    src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                                    class="fixed-img card-img-top" alt="...">
                                <div class="card-body" style="margin-top: 10px">
                                    <h2 class="card-title">{{ $candidate->name }}</h2>
                                </div>

                                <div class="card-footer d-flex">
                                    <a class="btn btn-dark" href="{{ route('candidate', $candidate->candidate_id) }}"
                                        role="button">
                                        <i class="bi bi-info-circle"></i> Info
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container">


                <input type="hidden" id="selectedCandidateId" name="candidate_id" value="">
                <div class="text-center">
                    <button class="btn btn-primary btn-lg" type="submit">Vote</button>
                </div>

            </div>
        </div>
    </form>
@endsection


@section('js')
    <script>
        let selectedCandidateId = null;

        function selectCandidate(obj) {
            let candidate = obj.getAttribute("data-candidate");

            if (candidate == selectedCandidateId) {
                selectedCandidateId = null;
                obj.classList.remove('selected');
                document.getElementById('selectedCandidateId').value = '';
                return;
            }

            var elem = document.getElementsByClassName('selected')[0];
            if (elem) {
                elem.classList.remove('selected');
            }

            selectedCandidateId = candidate;
            obj.classList.add('selected');
            document.getElementById('selectedCandidateId').value = candidate;
        }

        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();
                const candidateId = $('#selectedCandidateId').val();
                const nisn = $('#nisn').val();

                if (!candidateId) {
                    return false;
                }

                const formData = new FormData(this);

                $.ajax({
                    url: '{{ route('voting.submit') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (!res.easter) {
                            Swal.fire({
                                icon: (res.success ?
                                    "success" :
                                    "error"
                                    ),
                                title: (res.success ? 'Berhasil!' : 'Gagal!'),
                                text: res.msg,
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn-' + (res.success ? 'success' :
                                        'error')
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: 'Perhatian!',
                                text: res.msg,
                                background: '#f0f8ff',
                                color: '#333',
                                showClass: {
                                    popup: 'animate__animated animate__zoomIn'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOut'
                                },
                                timer: 5000,
                                timerProgressBar: true,
                                showCancelButton: false, // There won't be any cancel button
                                showConfirmButton: false, // There won't be any confirm button
                                allowOutsideClick: false
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: "Error tidak diketahui muncul...",
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn-error'
                            }
                        });
                    }
                });


                return true;
            });
        });
    </script>
@endsection
