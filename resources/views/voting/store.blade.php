<x-alert />

<form action="{{ route('voting.submit') }}" method="POST">
    @csrf
    @method("POST")
    <div>
        <label for="nisn">NISN:</label>
        <input type="text" id="nisn" name="nisn" required>
    </div>
    <div>
        <label for="candidate_id">Select Candidate:</label>
        <select id="candidate_id" name="candidate_id" required>
            <option value="">Pilih Kandidat</option>
            @foreach ($candidates as $candidate)
                <option value="{{ $candidate->candidate_id }}">{{ $candidate->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Vote</button>
    </div>
</form>
