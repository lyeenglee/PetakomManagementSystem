@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{_('Create new candidate') }}</div>
                <div class="card-body">
                    <!-- Post form-->
                    <form action="{{ url('/committee/election/menu') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="electionName" class="col-md-4 col-form-label">{{_('Name') }}</label>
                            <div class="col=md-6">
                                <input id="electionName" type="text" class="form-control" name="electionName" required/>
                            </div>
                        </div>

                        <!-- Year Field -->
                        <div class="row mb-3">
                            <label for="electionYear" class="col-md-4 col-form-label">{{_('Year') }}</label>
                            <div class="col=md-6">
                                <input id="electionYear" type="number" required min="1" max="10" class="form-control" name="electionYear" required/>
                            </div>
                        </div>

                        <!-- Category Field -->
                        <div class="row mb-3">
                            <label for="electionDescription" class="col-md-4 col-form-label">{{_('Category') }}</label>
                            <div class="form-check">
                                <input type="radio" name="eletionCategory" id="majlisTertinggiRdb">
                                <label class="radio-inline" style="margin-right: 5%" for="majlisTertinggiRdb">
                                    Majlis Tertinggi
                                </label>
                                <input type="radio" name="eletionCategory" id="majlisEksekutifRdb">
                                <label class="radio-inline" style="margin-right: 5%" for="majlisEksekutifRdb">
                                    Majlis Eksekutif
                                </label>
                            </div>
                        </div>

                        <!-- Course Field -->
                        <div class="row mb-3">
                            <label for="electionDescription" class="col-md-4 col-form-label">{{_('Course') }}</label>
                            <div class="form-check">
                                <input type="radio" name="electionCourse" id="softwareEngineeringRdb">
                                <label class="radio-inline" style="margin-right: 5%" for="softwareEngineeringRdb">
                                    Software Engineering
                                </label>
                                <input type="radio" name="electionCourse" id="computerNetworkRdb">
                                <label class="radio-inline" style="margin-right: 5%" for="computerNetworkRdb">
                                    Computer Systems & Networking
                                </label>
                                <input type="radio" name="electionCourse" id="graphicsMultimediaRbd">
                                <label class="radio-inline" style="margin-right: 5%" for="graphicsMultimediaRbd">
                                    Graphics & Multimedia Technology
                                </label>
                            </div>
                        </div>

                        <!-- Manifesto Field -->
                        <div class="row mb-3">
                            <label for="electionManifesto" class="col-md-4 col-form-label">{{_('Manifesto') }}</label>
                            <div class="col=md-6">
                                <textarea id="electionManifesto" type="text" class="form-control" name="electionManifesto" rows="5" required></textarea>
                            </div>
                        </div>

                        <!-- Candidate Image Field -->
                        <div class="row mb-3">
                            <label for="electionImage" class="col-form-label">{{_('Candidate Image') }}</label>
                            <div class="col=md-6">
                                <div class="custom-file">
                                    <input name="electionImage" type="file" class="form-control custom-file-input" id="electionImage">
                                </div>
                            </div>
                        </div>

                        <!-- Submit and Cancel Btn Field -->
                        <div class="col">
                            <div class="text-end">
                                <button class="col-2 btn btn-success pull-right" type="submit">Save</button>
                                <a href="{{ url('/committee/election/menu') }}" class="col-2 btn btn-secondary pull-right">Cancel</a>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection