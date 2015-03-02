<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="en" class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="en" class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="en" class="lt-ie9"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
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

#nestable-output,
#nestable2-output,
#nestable3-output {
    width: 100%;
    height: 7em;
    font-size: 0.75em;
    line-height: 1.333333em;
    font-family: Consolas, monospace;
    padding: 5px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background: -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background: linear-gradient(top, #bbb 0%, #999 100%);
}

#nestable2 .dd-handle:hover {
    background: #bbb;
}

#nestable2 .dd-item > button:before {
    color: #fff;
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

.dd-hover > .dd-handle {
    background: #2ea8e5 !important;
}

/**
 * Nestable Draggable Handles
 */

.dd3-content {
    display: block;
    height: 30px;
    margin: 5px 0;
    padding: 5px 10px 5px 40px;
    color: #333;
    text-decoration: none;
    font-weight: bold;
    border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background: linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.dd3-content:hover {
    color: #2ea8e5;
    background: #fff;
}

.dd-dragel > .dd3-item > .dd3-content {
    margin: 0;
}

.dd3-item > button {
    margin-left: 30px;
}

.dd3-handle {
    position: absolute;
    margin: 0;
    left: 0;
    top: 0;
    cursor: pointer;
    width: 30px;
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background: linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.dd3-handle:before {
    content: '≡';
    display: block;
    position: absolute;
    left: 0;
    top: 3px;
    width: 100%;
    text-align: center;
    text-indent: 0;
    color: #fff;
    font-size: 20px;
    font-weight: normal;
}

.dd3-handle:hover {
    background: #ddd;
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
    <button type="button" data-action="expand-all">Expand All</button>
    <button type="button" data-action="collapse-all">Collapse All</button>
    <input type="button" id="add" value="add">
    <input type="button" id="remove" value="remove">
    <input type="button" id="btn" value="test">
</menu>

<div class="cf nestable-lists">

    <div class="dd" id="nestable"></div>

    <div class="dd" id="nestable2">
        <ol class="dd-list">
            <li class="dd-item" data-id="13">
                <div class="dd-handle">Item 13</div>
            </li>
            <li class="dd-item" data-id="14">
                <div class="dd-handle">Item 14</div>
            </li>
            <li class="dd-item" data-id="15">
                <div class="dd-handle">Item 15</div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="16">
                        <div class="dd-handle">Item 16</div>
                    </li>
                    <li class="dd-item" data-id="17">
                        <div class="dd-handle">Item 17</div>
                    </li>
                    <li class="dd-item" data-id="18">
                        <div class="dd-handle">Item 18</div>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

</div>

<p><strong>Serialised Output (per list)</strong></p>

<textarea id="nestable-output"></textarea>
<textarea id="nestable2-output"></textarea>

<p>&nbsp;</p>

<div class="cf nestable-lists">

    <p><strong>Draggable Handles</strong></p>

    <p>If you're clever with your CSS and markup this can be achieved without any JavaScript changes.</p>

    <div class="dd" id="nestable3">
        <ol class="dd-list outer">
            <li class="dd-item dd3-item" data-id="13">
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">Item 13</div>
            </li>
            <li class="dd-item dd3-item" data-id="14">
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">Item 14</div>
            </li>
            <li class="dd-item dd3-item" data-id="15">
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">Item 15</div>
                <ol class="dd-list">
                    <li class="dd-item dd3-item" data-id="16">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">Item 16</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="17">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">Item 17</div>
                    </li>
                    <li class="dd-item dd3-item" data-id="18">
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">Item 18</div>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

</div>
<textarea id="nestable3-output"></textarea>

<p class="small">Copyright &copy; <a href="http://dbushell.com/">David Bushell</a> | Made for <a href="http://www.browserlondon.com/">Browser</a></p>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="jquery.nestable.js"></script>
<script>

    $(document).ready(function() {
        $("input#btn").on("click",function(){
            alert(window.JSON.stringify($('#nestable3').nestable('serialize')));
        });
        $("input#add").on("click",function(){
            $("ol.outer").append('<li class="dd-item dd3-item" data-id="25"><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 25</div></li>');
        });
        $("input#remove").on("click",function(){
            $('#nestable3').nestable(
                unsetParent(1)
            );
        });
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                    output = list.data('output');
            if(window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            }
            else {
                output.val('JSON browser support required for this demo.');
            }
        };

        var json = [
            {
                "id": 1,
                "content": "First item",
                "classes": ["dd-nochildren"]
            },
            {
                "id": 2,
                "content": "Second item",
                "children": [
                    {
                        "id": 3,
                        "content": "Item 3"
                    },
                    {
                        "id": 4,
                        "content": "Item 4"
                    },
                    {
                        "id": 5,
                        "content": "Item 5",
                        "value": "Item 5 value",
                        "foo": "Bar",
                        "children": [
                            {
                                "id": 6,
                                "content": "Item 6"
                            },
                            {
                                "id": 7,
                                "content": "Item 7"
                            },
                            {
                                "id": 8,
                                "content": "Item 8"
                            }
                        ]
                    }
                ]
            },
            {
                "id": 9,
                "content": "Item 9"
            },
            {
                "id": 10,
                "content": "Item 10",
                "children": [
                    {
                        "id": 11,
                        "content": "Item 11",
                        "children": [
                            {
                                "id": 12,
                                "content": "Item 12"
                            }
                        ]
                    }
                ]
            }
        ];

        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1,
            json: json,
            contentCallback: function(item) {
                var content = item.content || '' ? item.content : item.id;
                content += ' <i>(id = ' + item.id + ')</i>';

                return content;
            }
        }).on('change', updateOutput);

        // activate Nestable for list 2
        $('#nestable2').nestable({
            group: 1
        }).on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        updateOutput($('#nestable2').data('output', $('#nestable2-output')));


        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target),
                    action = target.data('action');
            if(action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if(action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable3').nestable();
        //updateOutput($('#nestable3').data('output', $('#nestable3-output')));
        console.log(window.JSON.stringify($('#nestable3').nestable('serialize')));
        //var obj = jQuery.parseJSON( $('#nestable3').nestable('serialize') );
        //alert( window.JSON.stringify($('#nestable3').nestable('serialize')) );
    });
</script>
<?php
$string = '[{"id":13},{"id":14},{"id":15,"children":[{"id":16},{"id":17},{"id":18}]}]';
$aaa = json_decode($string);
echo $aaa[2]->children[0]->id;
?>
</body>
</html>
