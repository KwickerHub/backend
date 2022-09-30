<?php


//will contain code to select from this table and more SQL Actions


echo '<style>
    .the_color_main_side{
        background-color: transparent;
        max-width: 95%;
	    min-width: 60%;
        text-align: center;
        padding: 7px;
    }

    .the_color_main_side .display_board{
        height: 230px;
        width: 230px;
        background-color: #000;
        padding: 12px;
    }

    .the_color_main_side label{
        display: block;
        padding: 7px;
    }

    .color_input{
        display: inline;
        color: darkblue;
        width: 65%;
        padding: 2px;
        background-color: darkgoldenrod;
        /* background: red; /* For browsers that do not support gradients
        background: -webkit-linear-gradient(-90deg, red, yellow); 
        background: -o-linear-gradient(-90deg, red, yellow);  
        background: -moz-linear-gradient(-90deg, red, yellow); 
        background: linear-gradient(-90deg, red, yellow);*/


        background: red; /* For browsers that do not support gradients */
        /* For Safari 5.1 to 6.0 */
        background: -webkit-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);
        /* For Opera 11.1 to 12.0 */
        background: -o-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);
        /* For Fx 3.6 to 15 */
        background: -moz-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);
        /* Standard syntax */
        background: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);
    }

    .color_side_range{
        width: 15%;
        padding: 4px;
        display: inline;
    }

    .the_add_colors{
        padding: 12px;
        border-radius: 3px;
    }

    .the_angle_inputter, .type_inputter_side{
        padding: 12px;
        border-radius: 12px;
        width: 80%;
    }

    .type_inputter_side option{
        padding: 12px;
        border-radius: 12px;
    }
</style>
<div class="the_color_main_side">
    <center>
        <div class="display_board" id="the_color_displayer">

        </div>    
    </center>
    
    <div class="the_input_section" id="the_color_Selection_boxes">   
        <input type="hidden" value="1" id="already_existing_color_box"/>             
        <label>
            RawFeed
            <input onchange="make_colorsBox_go()" class="the_checker_color" id="get_only_raw" type="checkbox"/>
        </label>

        <label class="color_section">
            <span class="input_text_side">Color:</span>
            <input class="color_input" id="color_input_00" onchange="change_color_displayer(event)" type="color" placeholder="colors picker"/>
            <input class="color_side_range" id="color_side_range_00" value="0" type="text"/>
        </label>

        <label class="color_section">
            <span class="input_text_side">Color:</span>
            <input class="color_input" id="color_input_11" onchange="change_color_displayer(event)" type="color" value="testing" placeholder="colors picker"/>
            <input class="color_side_range" id="color_side_range_11" value="0" type="text"/>
        </label>
    </div>
        <br/>
        <button onclick="add_colors_selector()" class="the_add_colors">Add Colors</button>
        <br/>
        <hr/>

    <div class="the_input_setters">
        <label>
            Repeat
            <input id="the_chief_master_repeat" class="the_checker_color" type="checkbox"/>
        </label>

        <label>
            Angle
            <input class="the_angle_inputter" id="colors_angle_getter" type="text" value="-90deg" placeholder="Enter an angle of inclination. LOL"/>
        </label>
        <label>
            Type
            <select class="type_inputter_side" id="type_color_getter">
                <option value="linear">Linear</option>
                <option value="radial">Radial</option>
            </select>
        </label>
        <br/><br/>

        <button onclick="apply_the_color(event)" class="the_add_colors">Apply</button>
    </div>
</div>';

?>