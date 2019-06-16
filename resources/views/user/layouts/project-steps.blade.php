<style>

.arrow-steps .step {
    border-top: 2px solid black;
    border-bottom: 2px solid black;
	font-size: 14px;
	text-align: center;
	color: #0099ff;
	cursor: default;
	margin: 0 1px;
	padding: 10px 10px 10px 30px;
	min-width: 194px;
	float: left;
	position: relative;
	background-color: #fff;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
    transition: background-color 0.2s ease;
}

.arrow-steps .step:after,
.arrow-steps .step:before {
	content: " ";
	position: absolute;
	top: 0;
	right: -17px;
	width: 0;
	height: 0;
	border-top: 31px solid transparent;
	border-bottom: 31px solid transparent;
	border-left: 17px solid #fff;
	z-index: 2;
  transition: border-color 0.2s ease;
}

.arrow-steps .step:before {
	right: auto;
	left: 0;
	border-left: 17px solid #0099ff;
	z-index: 0;
}

.arrow-steps .step:first-child:before {
	border: none;
}

.arrow-steps .step:first-child {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
}

.arrow-steps .step span {
	position: relative;
    margin: 0 auto;
}

.arrow-steps .step span:before {
	opacity: 0;
	content: "✔";
	position: absolute;
	top: -2px;
	left: -20px;
}

.arrow-steps .step.done span:before {
	opacity: 1;
	-webkit-transition: opacity 0.3s ease 0.5s;
	-moz-transition: opacity 0.3s ease 0.5s;
	-ms-transition: opacity 0.3s ease 0.5s;
	transition: opacity 0.3s ease 0.5s;
}

.arrow-steps .step.current {
	color: #fff;
	background-color: #0099ff;
}

.arrow-steps .step.current:after {
	border-left: 17px solid #868e96;
}
.step:first-child{
    border-left: 1px solid #0099ff;
}

.step:last-child{
    position: relative;
    margin-right: 0px;
}
.step:last-child:after{
    content: "";
    height: 46.5px;
    width: 46.5px;
    position: absoulate;
    background-color: #fff;
    transform: rotate(45deg);
    right: -23.8px;
    z-index: -10;
    top: 7.5px;
    border-right: 2px solid #0099ff;
    border-top: 2px solid #0099ff;
    border-left: none;
    border-bottom: none;
}
.step:last-child.current:after{
    background-color: #0099ff;

}
.bg-yellow{
	background-color: #ffbc00;
}
</style>



<div class="arrow-steps clearfix text-center">
    <div style="background-color: black; display: inline-block;">
    <div class="step {{$step == 1?'current': ''}}"> <span> step <strong>1</strong> <br>退会理由入力 </span> </div>
        <div class="step {{$step == 2?'current': ''}}"> <span>step <strong>2</strong> <br>退会理由確認</span> </div>
        <div class="step {{$step == 3?'current': ''}}"> <span> step <strong>3</strong> <br>退会申請完了</span> </div>
        <div class="step {{$step == 4?'current': ''}}"> <span> step <strong>3</strong> <br>退会申請完了</span> </div>
        <div class="step {{$step == 5?'current': ''}}"> <span> step <strong>3</strong> <br>退会申請完了</span> </div>

    </div>
</div>
