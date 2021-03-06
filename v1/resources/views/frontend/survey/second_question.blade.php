@extends('frontend.template_v1')
@section('title', 'Survey Step-2')
@section('content')




	
	
       
			
	 <div class="formify_right_fullwidth d-flex align-items-center justify-content-center">
			
                <div class="formify_box formify_box_checkbox background-white">
                    <div class="formify_header">
                        <h4 class="form_title">Website Satisfaction Survey </h4>
                        <p>To improve your experiences, can you please help us by answering these simple questions in the survey</p>
                        <div class="border ml-0"></div>
						<br>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="One" role="tabpanel" aria-labelledby="One-tab">
                            <!--<div class="number">1/3</div>-->
                            <h6>How did you hear about this website?</h6>
                            <form action="#" class="signup_form">
                                <div class="box_info">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios" id="budgetOne"
                                            value="option1" checked>
                                        <label class="form-check-label" for="budgetOne">
                                            Social Media
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios" id="budgetTwo"
                                            value="option2">
                                        <label class="form-check-label" for="budgetTwo">
                                            Advertising
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetThree" value="option3">
                                        <label class="form-check-label" for="budgetThree">
                                            Search Engine
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetFour" value="option4">
                                        <label class="form-check-label" for="budgetFour">
                                            Friend
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetFive" value="option5">
                                        <label class="form-check-label" for="budgetFive">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <button class="btn thm_btn next_tab text-transform-inherit">Next</button>
                        </div>
                        <div class="tab-pane fade" id="Two" role="tabpanel" aria-labelledby="Two-tab">
                            <!--<div class="number">2/3</div>-->
                            <h6>Which device did you use to access the website?</h6>
                            <form action="#" class="signup_form">
                                <div class="box_info">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios" id="budgetSix"
                                            value="option1">
                                        <label class="form-check-label" for="budgetSix">
                                            Desktop
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetSeven" value="option2">
                                        <label class="form-check-label" for="budgetSeven">
                                            Laptop
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetEight" value="option3">
                                        <label class="form-check-label" for="budgetEight">
                                            Pad
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetNine" value="option4">
                                        <label class="form-check-label" for="budgetNine">
                                            Mobile
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <button class="btn thm_btn next_tab text-transform-inherit">Next</button>
                        </div>
                        <div class="tab-pane fade" id="Three" role="tabpanel" aria-labelledby="Three-tab">
                            <div class="number">3/3</div>
                            <h6>Are you satisfied that you found out the website?</h6>
                            <form action="#" class="signup_form">
                                <div class="box_info">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios" id="budgetTen"
                                            value="option1">
                                        <label class="form-check-label" for="budgetTen">
                                            Very Satisfied
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetEleven" value="option2">
                                        <label class="form-check-label" for="budgetEleven">
                                            Satisfied
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetTweleve" value="option3">
                                        <label class="form-check-label" for="budgetTweleve">
                                            Neutral
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetThirteen" value="option4">
                                        <label class="form-check-label" for="budgetThirteen">
                                            Unsatisfied
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gridRadios"
                                            id="budgetFourteen" value="option5">
                                        <label class="form-check-label" for="budgetFourteen">
                                            Very unsatisfied
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn thm_btn text-transform-inherit">Submit</button>
                            </form>
                        </div>
                    </div>

                    <!-- <ul class="nav nav-tabs form_tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="One-tab" data-toggle="tab" href="#One" role="tab"
                                aria-controls="One" aria-selected="true"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Two-tab" data-toggle="tab" href="#Two" role="tab"
                                aria-controls="Two" aria-selected="false"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Three-tab" data-toggle="tab" href="#Three" role="tab"
                                aria-controls="Three" aria-selected="false"></a>
                        </li>
                    </ul> -->
                </div>
            </div>
    
   


@endsection

@push('scripts')


@endpush