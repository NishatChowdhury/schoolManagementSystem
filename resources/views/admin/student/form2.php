@section('style')
<style>
body {
    background: #eee
}

#regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}

h1 {
    text-align: center
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa
}

input.invalid {
    background-color: #ffdddd
}

.tab {
    display: none
}

button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

#prevBtn {
    background-color: #bbbbbb
}

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5
}

.step.active {
    opacity: 1
}

.step.finish {
    background-color: #4CAF50
}

.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}
</style>
@endsection
<!-- MultiStep Form -->
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <form id="regForm">
                <h3 class="text-center">Add New Student</h3>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                <div class="tab">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="form-group col-12">
                                    {{Form::label('name','Student\'s name',['class'=>'control-label'])}}
                                    {{ Form::text('name', null, ['placeholder' => 'Student\'s  Name...', 'oninput' => "this.className = ''" ]) }}
                                    @error('name')
                                        <b style="color: red">{{ $message }}</b>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-6">
                                    {{Form::label('studentId','Student ID',['class'=>'control-label'])}}
                                    {{ Form::text('studentId',null, ['placeholder' => 'Student ID...','oninput' => "this.className = ''",'id'=>'studentID']) }}
                                </div>
                                <div class="form-group col-6">
                                    {{ Form::label('rank','Rank',['class'=>'control-label']) }}
                                    {{ Form::text('rank',null,['placeholder'=>'Student Rank','oninput' => "this.className = ''",'id'=>'rank']) }}
                                </div>
                                <div class="form-group col-6">
                                    {{ Form::label('dob','Date of Birth',['class'=>'control-label']) }}
                                    {{ Form::date('dob',null,['oninput' => "this.className = ''", 'placeholder'=>'Date of Birth']) }}
                                </div>
                                
                                <div class="form-group col-6">
                                    {{ Form::label('gender','Gender',['class'=>'control-label']) }}
                                    {{ Form::select('gender_id', $repository->genders(), null, ['class'=>'form-control','placeholder' => 'Select Gender...','oninput' => "this.className = ''"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                           <div class="row">
                            <div class="form-group col-12">
                                {{ Form::label('fatherName','Father Name',['class'=>'control-label']) }}
                                {{ Form::text('father',null,['class'=>'form-control', 'placeholder'=>'Father Name']) }}
                            </div>
                            <div class="form-group col-12">
                                {{ Form::label('motherName','Mother Name',['class'=>'control-label']) }}
                        {{ Form::text('mother',null,['class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                            </div>
                            <div class="form-group col-6">
                                {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                        {{ Form::select('blood_group_id', $repository->bloods(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                            </div>
                            <div class="form-group col-6">
                                {{ Form::label('religion_id','Religion',['class'=>'control-label']) }}
                        {{ Form::select('religion_id', $repository->religions(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <p>
                        {{ Form::label('religion_id','Religion',['class'=>'control-label']) }}
                        {{ Form::select('religion_id', $repository->religions(), null, 
                        ['placeholder' => 'Select Blood Group...','oninput'=>"this.className = ''"]) }}


                    </p>
                    <p>{{ Form::label('fatherName','SSC Roll',['class'=>'control-label']) }}
                        {{ Form::text('ssc_roll',null,['class'=>'form-control', 'placeholder'=>'SSC Roll (Optional)','oninput'=>"this.className = ''"]) }}</p>
                </div>
                <div class="tab">
                    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
                    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
                </div>
                <div class="tab">
                    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
                </div>
                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <h3>Thanks for your information!</h3> <span>Your information has been saved! we will contact you shortly!</span>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.MultiStep Form -->
@section('script')
<script>
   var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


showTab(currentTab);

});

function showTab(n) {
var x = document.getElementsByClassName("tab");
x[n].style.display = "block";
if (n == 0) {
document.getElementById("prevBtn").style.display = "none";
} else {
document.getElementById("prevBtn").style.display = "inline";
}
if (n == (x.length - 1)) {
document.getElementById("nextBtn").innerHTML = "Submit";
} else {
document.getElementById("nextBtn").innerHTML = "Next";
}
fixStepIndicator(n)
}

function nextPrev(n) {
var x = document.getElementsByClassName("tab");
if (n == 1 && !validateForm()) return false;
x[currentTab].style.display = "none";
currentTab = currentTab + n;
if (currentTab >= x.length) {
// document.getElementById("regForm").submit();
// return false;
//alert("sdf");
document.getElementById("nextprevious").style.display = "none";
document.getElementById("all-steps").style.display = "none";
document.getElementById("register").style.display = "none";
document.getElementById("text-message").style.display = "block";




}
showTab(currentTab);
}

function validateForm() {
var x, y, i, valid = true;
x = document.getElementsByClassName("tab");
y = x[currentTab].getElementsByTagName("input");
for (i = 0; i < y.length; i++)
    { if (y[i].value=="" ) { y[i].className +=" invalid" ; valid=false; } }
     if (valid) { document.getElementsByClassName("step")[currentTab].className +=" finish" ; } return valid; } function fixStepIndicator(n) { var i, x=document.getElementsByClassName("step"); for (i=0; i < x.length; i++) { x[i].className=x[i].className.replace(" active", "" ); } x[n].className +=" active" ; }
</script>
@endsection
