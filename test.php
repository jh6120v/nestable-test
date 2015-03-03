<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<title>Nestable</title>
<link rel="stylesheet" href="jquery.nestable.css">
<style type="text/css">

.cf:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

* html .cf {
    zoom: 1;
}

*:first-child + html .cf {
    zoom: 1;
}

html {
    margin: 0;
    padding: 0;
}

body {
    font-size: 100%;
    margin: 0;
    padding: 1.75em;
    font-family: 'Helvetica Neue', Arial, sans-serif;
}

h1 {
    font-size: 1.75em;
    margin: 0 0 0.6em 0;
}

a {
    color: #2996cc;
}

a:hover {
    text-decoration: none;
}

p {
    line-height: 1.5em;
}

.small {
    color: #666;
    font-size: 0.875em;
}

.large {
    font-size: 1.25em;
}

/**
 * Nestable Extras
 */

.nestable-lists {
    display: block;
    clear: both;
    padding: 30px 0;
    width: 100%;
    border: 0;
    border-top: 2px solid #ddd;
    border-bottom: 2px solid #ddd;
}

#nestable-menu {
    padding: 0;
    margin: 20px 0;
}


@media only screen and (min-width: 700px) {

    .dd {
        float: left;
        width: 48%;
    }

    .dd + .dd {
        margin-left: 2%;
    }

}
</style>
</head>
<body>

<h1>Nestable</h1>

<p>Drag &amp; drop hierarchical list with mouse and touch compatibility (jQuery plugin)</p>

<p><strong><a href="https://github.com/dbushell/Nestable">Code on GitHub</a></strong></p>

<p><strong>PLEASE NOTE: I cannot provide any support or guidance beyond this README. If this code helps you that's great but I have no plans to develop Nestable beyond this demo (it's not a final product and
    has limited functionality). I cannot reply to any requests for help.</strong></p>

<menu id="nestable-menu">
    <input type="button" id="add" value="add">
    <input type="button" id="remove" value="remove">
    <input type="button" id="fix" value="fix">
    <input type="button" id="btn" value="value">
</menu>
<?php
$string = '[{"id":13},{"id":14},{"id":15,"children":[{"id":16},{"id":17},{"id":18}]}]';
$aaa = json_decode($string);
?>
<div class="cf nestable-lists">

    <div class="dd" id="nestable">
    	<ol class="dd-list">
<?php
foreach ($aaa as $k => $v) {
	echo '
	<li class="dd-item" data-id="' . $v->id . '" data-text="a' . $v->id . '">
    	<div class="dd-handle">Item ' . $v->id . '</div>';
	if ($v->children) {
		echo '<ol class="dd-list">';
		foreach ($v->children as $k2 => $v2) {
			echo '<li class="dd-item" data-id="' . $v2->id . '">
	    			    <div class="dd-handle">Item ' . $v2->id . '</div>
	    			</li>';
		}
		echo '</ol>';
	}
	echo '
    </li>';
}
?>
		</ol>
    </div>

</div>

<p>&nbsp;</p>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="jquery.nestable.js"></script>
<script>

    $(document).ready(function() {
        $("input#btn").on("click",function(){
            alert(window.JSON.stringify($('#nestable').nestable('serialize')));
        });
        $("input#add").on("click",function() {
        	if ($("#nestable > ol.dd-list").length == 0) {
        		$("#nestable").html('<ol class="dd-list"><li class="dd-item" data-id="25"><div class="dd-handle">Item 25</div></li></ol>');
        	} else {
            	$("#nestable > ol.dd-list").append('<li class="dd-item" data-id="25"><div class="dd-handle">Item 25</div></li>');
        	}
        });
        $("input#remove").on("click",function(){
        	var li = $('li[data-id=15]');
            if ( li.children("ol.dd-list").length == 0 ) {
            	alert("no");
            } else {
            	var a = li.children("ol.dd-list").html();
            	li.after(a).remove();
            }
        });
        $("input#fix").on("click",function(){
        	$("li[data-id=13]").data("text","bbb");
        });

        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1,
        })
        //console.log(window.JSON.stringify($('#nestable').nestable('serialize')));
    });
</script>
<?php

//$aaa = json_decode($string);
//echo $aaa[2]->children[0]->id;
?>
</body>
</html>
