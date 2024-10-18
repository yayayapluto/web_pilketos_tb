@extends('layouts.voting')

@section('title', 'Welcome')

@section('header')

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

    <form action="#" method="#">
        @csrf
        <div style="background-color:#0099FF;height:250px; width:100%;">
            <div style="margin-top: 140px; width:65%;margin-left:18%">
                <div style="width: 100%; text-align:center;">
                    <label style="color: white;" for="nisn" class="nisnlabel">NISN anda:</label><br>
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

                <div class="row justify-content-center " style="margin-top: 130px; padding-bottom: 10px;">
                    @foreach ($candidates as $candidate)
                        <div class="col-md-4" style="height: 500px">
                            <div class="card text-center containerkanidat" data-candidate="{{ $candidate->candidate_id }}"
                                onclick="selectCandidate(this)">
                                <img style="height: 285px; width:75%;object-fit:cover; margin-top:15px;border-radius:15px;margin-left:50px"
                                    src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                                    class="fixed-img card-img-top" alt="...">
                                <div class="card-body">
                                    <h2 class="card-title mb-5">{{ $candidate->name }}</h2>
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

            <div class="container" style="margin-top:50px">


                <input type="hidden" id="selectedCandidateId" name="candidate_id" value="">
                <div class="text-center my-5">
                    <button class="btn btn-primary" type="submit">Vote</button>
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
            $('form').on('submit', function() {
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
                    success: function() {
                        location.href = '{{ route('landing') }}';
                    },
                    error: function() {
                        location.href = '{{ route('landing') }}';
                    }
                });


                return true;
            });
        });
    </script>
@endsection
