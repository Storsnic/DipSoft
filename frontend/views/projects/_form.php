<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">

<style type="text/css">
    div.rows{
    	float: left;
   		width: 250px;
    }
    .col{
	    float:left;
	    padding: 5px 5px 5px 5px;
	    margin: 5px 5px 5px 5px;
	}

	#col1{
	    width:200px;
	    height:500px;
	    border:1px solid black;

	}

	.drag{
	    width:100px;
	    border:1px solid black;
	    height:80px;
	    position:relative;
	    /*background-color:red;*/
	}

	.start{
	    width:30px;
	    border: none;
	    height:30px;
	    position:relative;
	    /*background-color:red;*/
	}
	.drag_s{
	    width:100px;
	    border:1px solid blue;
	    height:80px;
	    position:relative;
	    /*background-color:red;*/
	}

	.drag_e{
	    width:100px;
	    border:1px solid red;
	    height:80px;
	    position:relative;
	    /*background-color:red;*/
	}

	.line{
	    width:72px;
	    /*border:1px solid black;*/
	    height:72px;
	    position:relative;
	    background-color:white;
	}

	#droppable{
	    width:500px;
	    height :500px;
	    border:1px solid black;
	}
	#code{
	    width:400px;
	    height :500px;
	    border:1px solid black;
	}		

</style>

<script type="text/javascript">
	

	$(document).ready(function () {

	
	

    diag = $('#projects-diagram1').val();
	$("#droppable").html(diag);
	document.getElementById('process1button').disabled = true;

	
	var diag = null;
    var x = null;

    //Make element draggable
    $(".drag").draggable({
        helper: 'clone',
        cursor: 'move',
        tolerance: 'fit',
        snap: ".line",
	    snapMode: "both",
	    snapTolerance: 10
    });
    
    $(".ui-resizable").draggable({
        helper: 'original',
        containment: '#droppable',
        tolerance: 'fit',
        snap: ".line",
	    snapMode: "both",
	    snapTolerance: 10
    });

    $(".line").draggable({
        helper: 'clone',
        cursor: 'move',
        tolerance: 'fit',
        snap: ".drag",
	    snapMode: "both",
	    snapTolerance: 10,
	    
    });

    $(".ui-selectable").draggable({
        helper: 'original',
        containment: '#droppable',
        tolerance: 'fit',
        snap: ".drag",
	    snapMode: "both",
	    snapTolerance: 10
    });

    


    $("#droppable").droppable({

        drop: function (e, ui) {

            if ($(ui.draggable)[0].id != "") {
                x = ui.helper.clone();
                //alert ($(ui.draggable)[0].id);
            ui.helper.remove();
            x.draggable({
                helper: 'original',
                containment: '#droppable',
                tolerance: 'fit'
            });
            
			if ($(ui.draggable)[0].id == "line1") {
	            // x.resizable({
	            //     minHeight: 10,
	            //     maxHeight: 500,	                
	            //     minWidth: 15,
	            //     maxWidth: 15,
	            //     // alsoResize: ".line img"
	            // });
	            x.draggable({
	            	snap: ".drag",
				    snapMode: "both",
				    snapTolerance: 10
	            });
	            x.selectable();
	        }

	        if ($(ui.draggable)[0].id == "drag1") {
	            x.resizable({
	                minHeight: 50,
	                maxHeight: 1000,	                
	                minWidth: 50,
	                maxWidth: 1000,	                
	            });
	            x.draggable({
	            	snap: ".line",
				    snapMode: "both",
				    snapTolerance: 10
	            });	            
	        }

            x.appendTo('#droppable');
        }

        }
    });


	$('#process1button').click(function(){
        diag = ($("#droppable").html());
		$('#projects-diagram2').val(diag);
		
        diag = $('#projects-diagram1').val();
		$("#droppable").html(diag);

		document.getElementById('process1button').disabled = true;
		document.getElementById('process2button').disabled = false;
		$(".drag").draggable({
        helper: 'clone',
        cursor: 'move',
        tolerance: 'fit',
        snap: ".line",
	    snapMode: "both",
	    snapTolerance: 10
    });
    
    $(".ui-resizable").draggable({
        helper: 'original',
        containment: '#droppable',
        tolerance: 'fit',
        snap: ".line",
	    snapMode: "both",
	    snapTolerance: 10
    });

    $(".line").draggable({
        helper: 'clone',
        cursor: 'move',
        tolerance: 'fit',
        snap: ".drag",
	    snapMode: "both",
	    snapTolerance: 10,
	 //    stop: function(event, ui) { 
  //       /* Get the possible snap targets: */
  //       var snapped = $(this).data('ui-draggable').snapElements;
       
  //       /* Pull out only the snap targets that are "snapping": */
  //       var snappedTo = $.map(snapped, function(element) {
  //           return element.snapping ? element.item : null;
  //       });
       
  //       /* Display the results: */
  //       var result= '';
  //       $.each(snappedTo, function(idx, item) {
  //           result += $(item).text() + ", ";
  //       });
        
  //       $("#code").html("Snapped to: " + (result === '' ? "Nothing!" : result));
		// }
    });

    $(".ui-selectable").draggable({
        helper: 'original',
        containment: '#droppable',
        tolerance: 'fit',
        snap: ".drag",
	    snapMode: "both",
	    snapTolerance: 10
    });
    });

	$('#process2button').click(function(){
        diag = ($("#droppable").html());
		$('#projects-diagram1').val(diag);

        diag = $('#projects-diagram2').val();
		$("#droppable").html(diag);

		document.getElementById('process1button').disabled = false;
		document.getElementById('process2button').disabled = true;
		$(".drag").draggable({
        helper: 'clone',
        cursor: 'move',
        tolerance: 'fit',
        snap: ".line",
	    snapMode: "both",
	    snapTolerance: 10
    });
    
    $(".ui-resizable").draggable({
        helper: 'original',
        containment: '#droppable',
        tolerance: 'fit',
        snap: ".line",
	    snapMode: "both",
	    snapTolerance: 10
    });

    $(".line").draggable({
        helper: 'clone',
        cursor: 'move',
        tolerance: 'fit',
        snap: ".drag",
	    snapMode: "both",
	    snapTolerance: 10,

	    
    });

    $(".ui-selectable").draggable({
        helper: 'original',
        containment: '#droppable',
        tolerance: 'fit',
        snap: ".drag",
	    snapMode: "both",
	    snapTolerance: 10
    });
    });

    

	$('#savebutton').click(function(){
        
		if(document.getElementById('process1button').disabled == true)
		{
			diag = ($("#droppable").html());
			$('#projects-diagram1').val(diag);	
		}
		else
		{
			diag = ($("#droppable").html());
			$('#projects-diagram2').val(diag);
		}
        
    });

    $('#clearbutton').click(function(){
        $("#droppable").html("");
        $("#code").html("");
        $('#projects-diagram1').val("");
        $('#projects-diagram2').val("");
    });


	$('#gencode').click(function(){

		function matrixArray(rows,columns){
			  var arr = new Array();
			  for(var i=0; i<columns; i++){
			    arr[i] = new Array();
			    for(var j=0; j<rows; j++){
			      arr[i][j] = 5;//вместо i+j+1 пишем любой наполнитель. В простейшем случае - null
			    }
			  }
			  return arr;
		}		
		var valMatrix = matrixArray(10,10);

	    var str = $('#projects-diagram1').val();
	    var str2 = $('#projects-diagram2').val();
	    var strA = str+str2;
		var target = "<div class=\"drag";
		var nameS = "Name:";
		var codeS = "Code:";
		var tz = ";";

		var pos = 0;
		var count = 0;
		var count1 = 0;
		var count2 = 0;
		var fromP = 0;
		var toP = 0;		
		
		while (true) {
		  var foundPos = strA.indexOf(target, pos);
		  if (foundPos == -1) break;
		  pos = foundPos + 1; // продолжить поиск со следующей
		  count = count + 1;
		}

		var pos = 0;
		while (true) {
		  var foundPos = str.indexOf(target, pos);
		  if (foundPos == -1) break;
		  pos = foundPos + 1; // продолжить поиск со следующей
		  count1 = count1 + 1;
		}
		// alert(count1);

		var pos = 0;
		while (true) {
		  var foundPos = str2.indexOf(target, pos);
		  if (foundPos == -1) break;
		  pos = foundPos + 1; // продолжить поиск со следующей
		  count2 = count2 + 1;
		}

		text = "mtype = {s1,s2,";
		tcount = 1;
		while (tcount <= count)
		{
			text += "s" + String(tcount+2) + ",";
			tcount ++;
		}
		text = text.slice(0, -1);
		text += "};<br>";
		text += $('#projects-vars').val();

		var pos = 0;
		var fromP = 0;
		var toP = 0;
		var ncount = 0;

		while (true) {
			foundPos = str.indexOf(nameS, pos);
			if (foundPos == -1) break;
			ncount ++;

			fromP = foundPos+5;
			pos = foundPos + 1;
			foundPos = str.indexOf(tz, pos);
			toP = foundPos;			
			pos = foundPos + 1;
			
			valMatrix[ncount][1] = str.slice(fromP, toP);

			fromP = pos + 5;
			pos = foundPos + 5;
			foundPos = str.indexOf("</p>", pos);
			pos = foundPos;
			toP = pos;
			valMatrix[ncount][2] = str.slice(fromP, toP);
			pos = foundPos;


			// alert(valMatrix[ncount][1]);
			// alert(valMatrix[ncount][2]);
		}


		
		
		curcount = 1;
		// alert (count);
		text += "<br>active proctype Process1()<br>{<br>mtype state;";		
		text += "<br>state = s1;";
		text += "<br>do :: state != s" + String(count1+2) + " ->  {<br>if<br>";
		text += ":: state == s1 -><br>{<br>}";
		// curcount++;
		while (curcount <= count1)
		{
			text += "<br>:: state == s" + String(curcount+1) + " -><br>{<br>printf(\""+valMatrix[curcount][1]+"\"); ";
			text += "<br>"+valMatrix[curcount][2]+"<br>}";
			curcount ++;
		}
		text += "<br>:: state == s" + String(curcount+1) + " -><br>{<br>}";
		text += "<br>fi<br>}<br>od<br>}";
		curcount ++;

		var pos = 0;
		var fromP = 0;
		var toP = 0;
		// ncount = 3;
		while (true) {
			foundPos = str2.indexOf(nameS, pos);
			if (foundPos == -1) break;
			ncount ++;

			fromP = foundPos+5;
			pos = foundPos + 1;
			foundPos = str2.indexOf(tz, pos);
			toP = foundPos;			
			pos = foundPos + 1;
			
			valMatrix[ncount][1] = str2.slice(fromP, toP);

			fromP = pos + 5;
			pos = foundPos + 5;
			foundPos = str2.indexOf("</p>", pos);
			pos = foundPos;
			toP = pos;
			valMatrix[ncount][2] = str2.slice(fromP, toP);
			pos = foundPos;


			// alert(valMatrix[ncount][1]);
			// alert(valMatrix[ncount][2]);
		}

		if(str2!="")
		{
			curcount = count1 + 2;
			text += "<br><br>active proctype Process2()<br>{<br>mtype state;";
			text += "<br>state = s" + String(curcount+1) + ";";
			text += "<br>do :: state != s" + String(count) + " ->  {<br>if<br>";
			while (curcount <= count)
			{
				text += "<br>:: state == s" + String(curcount) + " -><br>{<br>printf(\""+valMatrix[curcount][1]+"\"); ";
				text += "<br>"+valMatrix[curcount][2]+"<br>}";
				curcount ++;
			}
			text += "<br>fi<br>}<br>od<br>}";
		}
		
		



		$("#codetext").html(text);
	});




});
	

	
	$(function(){
	    $(document).on('dblclick', 'div.change_off',function(){
	        $(this).find('p').html( $('<textarea />').text( $(this).text() ) )
	        $(this).removeClass('change_off').addClass('change_on')

	        $('div.change_on textarea').on('change',function(){
	            $(this).closest('.change_on').removeClass('change_on').addClass('change_off')
	            $(this).parent().html( $(this).val() )
	            $(this).unbind('change');
	        })
	    })
	})



</script>


<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   	<div id = "vars" style="width: 400px; float:left; margin-right: 10px;">
    	<?= $form->field($model, 'vars')->textInput(['maxlength' => true]) ?>    
    </div>
    <div style="width: 400px; float:left; margin-right: 10px;">
		<?= $form->field($model, 'req')->textInput(['maxlength' => true]) ?>
	</div>
	<div style="width: 200px; float:left; margin-right: 10px;">
		<?= $form->field($model, 'lang')->dropDownList(['1' => 'Promela'],['prompt'=>'Select Language']);?>
	</div>
	<div style="clear:both"></div>

    <div id="wrapper">
        <div class = "col" id="col1" style="overflow-y: auto;">
            <div id="drag1" class="start drag" >
            	<img src="img/start.png" />
            </div><br>

            <div id="drag1" class="start drag" >
            	<img src="img/end.png" />
            </div><br>

            <!-- <div id="drag1" class="drag drag_s change_off" >
            <p>Name: ;<br>Code: ;<br></p>
            </div><br> -->

            <div id="drag1" class="drag change_off" >
            <p>Name: ;<br>Code: ;<br></p>
            </div><br>

            <!-- <div id="drag1" class="drag drag_e change_off" >
            <p>Name: ;<br>Code: ;<br></p>
            </div><br> -->

            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow1.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow2.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow3.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow4.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow5.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow6.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow7.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow8.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow9.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow10.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow11.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
            <div id="line1" class="line change_off">            	
            	<div style="float:left;">
            		<img src="img/arrow12.png" style="float: left;" />
            	</div>
            	<div style="float:left;">
            	<p></p>
				</div>
            </div>
        </div>
        <div class="col" id ="droppable" style="overflow-y: auto;">
		</div>
        <div class="col" id ="code" style="overflow-y: scroll;">
        <p id = "codetext"></p>
        </div>

    </div>





	<?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(''); ?>
	<?= $form->field($model, 'diagram1')->hiddenInput(['maxlength' => true])->label(''); ?>
	<?= $form->field($model, 'diagram2')->hiddenInput(['maxlength' => true])->label(''); ?>
	

    <div class="form-group">
        <?= Html::Button('Generate code', ['id' => 'gencode', 'class' => 'btn btn-primary']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save project', ['id' => 'savebutton', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::Button('Clear Project', ['id' => 'clearbutton', 'class' => 'btn btn-primary']) ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= Html::Button('Process 1', ['id' => 'process1button', 'class' => 'btn btn-primary process1_active']) ?>
        <?= Html::Button('Process 2', ['id' => 'process2button', 'class' => 'btn btn-primary process2']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
