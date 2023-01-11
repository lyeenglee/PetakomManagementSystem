@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header formbold-form-label formbold-form-label-2">{{_('Proposal Submission') }}</div>
                <div class="card-body">
                    <form action="{{ url('proposal') }}" method="POST" onchange="myFunction()">
                        @csrf

                        <div class="row mb-3">
                            <label for="proposalTitle" class="col-md-4 col-form-label">{{_('Proposal Title*')}} </label>
                            <div class="col=md-6">
                                <input id="proposalTitle" type="text" class="form-control" name="proposalTitle" required/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-3 col-form-label ">{{_('Submission Date*')}} </label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input id="date" type="date" class="form-control" name="date" required/>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="proposalDescription" class="col-md-4 col-form-label">{{_('Description*') }}</label>
                            <div class="col=md-6">
                                <textarea id="proposalDescription" type="text" class="form-control" name="proposalDescription" rows="5" required></textarea>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="proposalUrl" class="col-form-label">{{_('Attach any supporting documentation. Example: Licenese, Permits, Recommendations*') }}</label>
                            <div class="col=md-6">
                                <div class="custom-file">
                                    <input name="proposalUrl" type="file" class="form-control custom-file-input" id="proposalUrl">
                                </div>
                            </div>
                        </div>
                        <br>

                    <div class="card-header formbold-form-label formbold-form-label-2">{{_('Contact Information') }}</div>

                        <div class="row mb-3">
                            <label for="firstName" class="col-md-5 col-form-label ">{{_('First Name')}} </label>
                            <label for="lastName" class="col-md-5 col-form-label ">{{_('Last Name')}} </label>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <input id="firstName" type="text" class="form-control" name="firstName" required/>
                            </div>
                            <div class="col-md-5">
                                <input id="lasttName" type="text" class="form-control" name="lastName" required/>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phoneNumber" class="col-form-label">{{_('Phone Number*') }}</label>
                            <div class="col-md-8">
                                <div class="col-md-8">
                                    <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                        <button class="formbold-btn" type="submit">{{_('Submit Proposal') }}</button>
                        </div>    


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

.formbold-form-label {
      display: block;
      font-weight: 500;
      font-size: 16px;
      color: #07074d;
      margin-bottom: 12px;
    }


.formbold-form-label-2 {
      font-weight: 600;
      font-size: 20px;
      margin-bottom: 20px;
    }

    .formbold-btn {
      text-align: center;
      font-size: 16px;
      border-radius: 6px;
      padding: 14px 32px;
      border: none;
      font-weight: 600;
      background-color: #6a64f1;
      color: white;
      width: 100%;
      cursor: pointer;
    }
    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
</style>

@endsection