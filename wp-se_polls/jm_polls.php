<?php
/*
Plugin Name: Social Engine Polls 
Plugin URI: http://2cq.it/
Description: This plugin/widget retrieves the Last X SE Polls and display them in your Wordpress Sidebar. To show your SE polls in the other pages of your wp, simply put the code <code>&lt;?php joomood_polls(); ?&gt;</code> where you want in your template.
Author: JooMood
Version: 1.0
Author URI: http://2cq.it/

	Copyright 2009, JooMOod
	-----------------------

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
*/

function joomood_polls_install() {

	$newoptions = get_option('joomood_polls_options');
	
    $newoptions['title']					='JooMood SE Polls';
    $newoptions['numOfGroup']				='6';
    $newoptions['how_many_groups']			='1';
    $newoptions['go_profile_text1']			='See the poll';
    $newoptions['go_profile_text']			='See the profile of';
    $newoptions['nametype']					='2';
	$newoptions['mainbox_border_style']		='0';
	$newoptions['mainbox_border_color']		='#333333';
	$newoptions['mainbox_border_dim']		='1';
	$newoptions['mainbox_bg_color']			='#ededed';
	$newoptions['box_border_style']			='0';
	$newoptions['box_border_color']			='#333333';
	$newoptions['box_border_dim']			='1';
	$newoptions['box_bg_color']				='#f7f7f7';
	$newoptions['box_bg_color1']				='#f4f9ff';
	$newoptions['outer_cellspacing']		='4';
	$newoptions['outer_cellpadding']		='2';
	$newoptions['inner_cellspacing']		='4';
	$newoptions['inner_cellpadding']		='2';
	$newoptions['cut_off']					='100';

	add_option('joomood_polls_options', $newoptions);

}


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// add the admin page
function joomood_polls_add_pages() {
	add_options_page('SE Polls', 'SE Polls', 8, __FILE__, 'joomood_polls_options');
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function joomood_polls() {

  $newoptions = get_option("joomood_polls_options");

  	echo $before_widget;
    echo $before_title;
    echo "<h3>";

    echo $newoptions['title'];
    
    $title		 				= $newoptions['title'];
    $numOfGroup 				= $newoptions['numOfGroup'];
    $how_many_groups 			= $newoptions['how_many_groups'];
    $go_profile_text 			= $newoptions['go_profile_text'];
    $go_profile_text1 			= $newoptions['go_profile_text1'];
    $nametype 					= $newoptions['nametype'];
	$mainbox_border_style		= $newoptions['mainbox_border_style'];
	$mainbox_border_color		= $newoptions['mainbox_border_color'];
	$mainbox_border_dim			= $newoptions['mainbox_border_dim'];
	$mainbox_bg_color			= $newoptions['mainbox_bg_color'];
	$box_border_style			= $newoptions['box_border_style'];
	$box_border_color			= $newoptions['box_border_color'];
	$box_border_dim				= $newoptions['box_border_dim'];
	$box_bg_color				= $newoptions['box_bg_color'];
	$box_bg_color1				= $newoptions['box_bg_color1'];
	$outer_cellspacing			= $newoptions['outer_cellspacing'];
	$outer_cellpadding			= $newoptions['outer_cellpadding'];
	$inner_cellspacing			= $newoptions['inner_cellspacing'];
	$inner_cellpadding			= $newoptions['inner_cellpadding'];
	$cut_off					= $newoptions['cut_off'];
	    
    
    echo $after_title;
    echo"</h3><br />";

	
	// Load main file
	
    include(ABSPATH.'wp-content/plugins/wp-se_polls/main/se_polls.php');

    echo $after_widget;
    echo "<br /><br />";

} // End of se_groups function



// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


	function joomood_polls_options() {

	$options = $newoptions = get_option('joomood_polls_options');

	if ( $_POST["mypolls_submit"] ) {

    $newoptions['title'] =htmlspecialchars($_POST['title']);
    $newoptions['numOfGroup'] = $_POST['numOfGroup'];
    $newoptions['how_many_groups'] = $_POST['how_many_groups'];
    $newoptions['go_profile_text'] = htmlspecialchars($_POST['go_profile_text']);
    $newoptions['go_profile_text1'] = htmlspecialchars($_POST['go_profile_text1']);
    $newoptions['nametype'] = $_POST['nametype'];
	$newoptions['mainbox_border_style'] = $_POST['mainbox_border_style'];
	$newoptions['mainbox_border_color'] = $_POST['mainbox_border_color'];
	$newoptions['mainbox_border_dim'] = $_POST['mainbox_border_dim'];
	$newoptions['mainbox_bg_color'] = $_POST['mainbox_bg_color'];
	$newoptions['box_border_style'] = $_POST['box_border_style'];
	$newoptions['box_border_color'] = $_POST['box_border_color'];
	$newoptions['box_border_dim'] = $_POST['box_border_dim'];
	$newoptions['box_bg_color'] = $_POST['box_bg_color'];
	$newoptions['box_bg_color1'] = $_POST['box_bg_color1'];
	$newoptions['outer_cellspacing'] = $_POST['outer_cellspacing'];
	$newoptions['outer_cellpadding'] = $_POST['outer_cellpadding'];
	$newoptions['inner_cellspacing'] = $_POST['inner_cellspacing'];
	$newoptions['inner_cellpadding'] = $_POST['inner_cellpadding'];
	$newoptions['cut_off'] = $_POST['cut_off'];


	}
	
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('joomood_polls_options', $options);
	}


	echo '<form method="post">';
	echo "<div class=\"wrap\"><h2>JooMood Social Engine Polls - Display Options</h2>";
	echo '<table class="form-table">';

	echo '<tr valign="top">';
	echo '<th scope="row">Title of the block</th><td><input name="title" type="text" value="'.$options['title'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">How many Polls you want to display?</th><td><input name="numOfGroup" type="text" value="'.$options['numOfGroup'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">How many Polls in every line?</th><td><input name="how_many_groups" type="text" value="'.$options['how_many_groups'].'" /></td></tr>';

	echo '<tr valign="top">
	<th scope="row">User Link Title</th><td><input name="go_profile_text" type="text" value="'.$options['go_profile_text'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Poll Link Title</th><td><input name="go_profile_text1" type="text" value="'.$options['go_profile_text1'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Type of Name</th><td>
    <select name="nametype" id="nametype">
      <option ';
      if($options['nametype'] == "1"){ echo ' selected '; } echo 'value="1">Username</option>
      <option ';
      if($options['nametype'] == "2"){ echo ' selected '; } echo 'value="2">Full Name</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Style</th><td>
    <select name="mainbox_border_style" id="mainbox_border_style">
      <option ';
      if($options['mainbox_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>
      <option ';
      if($options['mainbox_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>
      <option ';
      if($options['mainbox_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Color</th><td><input name="mainbox_border_color" type="text" value="'.$options['mainbox_border_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Thickness</th><td><input name="mainbox_border_dim" type="text" value="'.$options['mainbox_border_dim'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Background Color</th><td><input name="mainbox_bg_color" type="text" value="'.$options['mainbox_bg_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Style</th><td>
    <select name="box_border_style" id="box_border_style">
      <option ';
      if($options['box_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>
      <option ';
      if($options['box_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>
      <option ';
      if($options['box_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Color</th><td><input name="box_border_color" type="text" value="'.$options['box_border_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Thickness</th><td><input name="box_border_dim" type="text" value="'.$options['box_border_dim'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Background Color</th><td><input name="box_bg_color" type="text" value="'.$options['box_bg_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Alternate Inner box Background Color</th><td><input name="box_bg_color1" type="text" value="'.$options['box_bg_color1'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Cellspacing</th><td><input name="outer_cellspacing" type="text" value="'.$options['outer_cellspacing'].'" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Mainbox Cellpadding</th><td><input name="outer_cellpadding" type="text" value="'.$options['outer_cellpadding'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Cellspacing</th><td><input name="inner_cellspacing" type="text" value="'.$options['inner_cellspacing'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner Cellpadding</th><td><input name="inner_cellpadding" type="text" value="'.$options['inner_cellpadding'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Cut Poll Title after X Chars</th><td><input name="cut_off" type="text" value="'.$options['cut_off'].'" /></td>
	</tr>

	<input type="hidden" name="mypolls_submit" value="true">

	</table>

	<p class="submit"><input type="submit" value="Update Options &raquo;"></input></p>

	</div>

	</form>';


	} // End of se_groups_options function


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function widget_SePoll($args) {
  extract($args);

  $options = get_option("widget_SePoll");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'JooMood SE Polls',
      'numOfGroup' => '3',
      'how_many_groups'=>'1',
      'go_profile_text1'=>'See the poll',
      'go_profile_text'=>'See the profile of',
      'nametype'=>'2',
      'mainbox_width'=>'100',
      'mainbox_border_style'=>'0',
      'mainbox_border_color'=>'#333333',
      'mainbox_border_dim'=>'1',
      'mainbox_bg_color'=>'#ededed',
      'box_border_style'=>'0',
      'box_border_color'=>'#333333',
      'box_border_dim'=>'1',
      'box_bg_color'=>'#f7f7f7',
      'box_bg_color1'=>'#f4f9ff',
      'outer_cellspacing'=>'4',
      'outer_cellpadding'=>'2',
      'inner_cellspacing'=>'4',
      'inner_cellpadding'=>'2',
      'cut_off'=>'100'
      );
  }      

  	echo $before_widget;
    echo $before_title;

    echo $options['title'];
    
    $title		 				= $options['title'];
    $numOfGroup 				= $options['numOfGroup'];
    $how_many_groups 			= $options['how_many_groups'];
    $go_profile_text 			= $options['go_profile_text'];
    $go_profile_text1 			= $options['go_profile_text1'];
    $nametype 					= $options['nametype'];
	$mainbox_width				= $options['mainbox_width'];
	$mainbox_border_style		= $options['mainbox_border_style'];
	$mainbox_border_color		= $options['mainbox_border_color'];
	$mainbox_border_dim			= $options['mainbox_border_dim'];
	$mainbox_bg_color			= $options['mainbox_bg_color'];
	$box_border_style			= $options['box_border_style'];
	$box_border_color			= $options['box_border_color'];
	$box_border_dim				= $options['box_border_dim'];
	$box_bg_color				= $options['box_bg_color'];
	$box_bg_color1				= $options['box_bg_color1'];
	$outer_cellspacing			= $options['outer_cellspacing'];
	$outer_cellpadding			= $options['outer_cellpadding'];
	$inner_cellspacing			= $options['inner_cellspacing'];
	$inner_cellpadding			= $options['inner_cellpadding'];
	$cut_off					= $options['cut_off'];	    
    
    echo $after_title;

	
	// Load main file
	
    include(ABSPATH.'wp-content/plugins/wp-se_polls/main/se_polls.php');

    echo $after_widget;

} // End of widget_SePoll function


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function SePoll_control()
{
  $options = get_option("widget_SePoll");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'JooMood SE Polls',
      'numOfGroup' => '3',
      'how_many_groups'=>'1',
      'go_profile_text1'=>'See the poll',
      'go_profile_text'=>'See the profile of',
      'nametype'=>'2',
      'mainbox_width'=>'100',
      'mainbox_border_style'=>'0',
      'mainbox_border_color'=>'#333333',
      'mainbox_border_dim'=>'1',
      'mainbox_bg_color'=>'#ededed',
      'box_border_style'=>'0',
      'box_border_color'=>'#333333',
      'box_border_dim'=>'1',
      'box_bg_color'=>'#f7f7f7',
      'box_bg_color1'=>'#f4f9ff',
      'outer_cellspacing'=>'4',
      'outer_cellpadding'=>'2',
      'inner_cellspacing'=>'4',
      'inner_cellpadding'=>'2',
      'cut_off'=>'100'
      );
  }    

  if ($_POST['SePoll-Submit'])
  {
    	
    $options['numOfGroup'] = $_POST['SePoll-numOfGroup'];
    if($options['numOfGroup']=="") {
    $options['numOfGroup']="3";
    }

    $options['title'] = htmlspecialchars($_POST['SePoll-WidgetTitle']);
    if($options['title']=="") {
    $options['title']="Last ".$options['numOfGroup']." SE Polls";
    }
 
    $options['how_many_groups'] = $_POST['SePoll-how_many_groups'];
    if($options['how_many_groups']=="") {
    $options['how_many_groups']="1";
    }
 
    $options['go_profile_text'] = htmlspecialchars($_POST['SePoll-go_profile_text']);
    if($options['go_profile_text']=="") {
    $options['go_profile_text']="";
    }
 
    $options['go_profile_text1'] = htmlspecialchars($_POST['SePoll-go_profile_text1']);
    if($options['go_profile_text1']=="") {
    $options['go_profile_text1']="";
    }
 
    $options['nametype'] = $_POST['SePoll-nametype'];
    if ($options['nametype']=="") {
    $options['nametype']="2";
    }

	$options['mainbox_width'] = $_POST['SePoll-mainbox_width'];
    if ($options['mainbox_width']=="") {
    $options['mainbox_width']="100";
    }

	$options['mainbox_border_style'] = $_POST['SePoll-mainbox_border_style'];
    if ($options['mainbox_border_style']=="") {
    $options['mainbox_border_style']="0";
    }

	$options['mainbox_border_color'] = $_POST['SePoll-mainbox_border_color'];
    if ($options['mainbox_border_color']=="") {
    $options['mainbox_border_color']="#333333";
    }

	$options['mainbox_border_dim'] = $_POST['SePoll-mainbox_border_dim'];
    if ($options['mainbox_border_dim']=="") {
    $options['mainbox_border_dim']="1";
    }
    
	$options['mainbox_bg_color'] = $_POST['SePoll-mainbox_bg_color'];
    if ($options['mainbox_bgcolor']=="") {
    $options['mainbox_bgcolor']="#ededed";
    }

	$options['box_border_style'] = $_POST['SePoll-box_border_style'];
    if ($options['box_border_style']=="") {
    $options['box_border_style']="0";
    }

	$options['box_border_color'] = $_POST['SePoll-box_border_color'];
    if ($options['box_border_color']=="") {
    $options['box_border_color']="#333333";
    }

	$options['box_border_dim'] = $_POST['SePoll-box_border_dim'];
    if ($options['box_border_dim']=="") {
    $options['box_border_dim']="1";
    }
    
	$options['box_bg_color'] = $_POST['SePoll-box_bg_color'];
    if ($options['box_bg_color']=="") {
    $options['box_bg_color']="#f7f7f7";
    }

	$options['box_bg_color1'] = $_POST['SePoll-box_bg_color1'];
    if ($options['box_bg_color1']=="") {
    $options['box_bg_color1']="#f4f9ff";
    }

	$options['outer_cellspacing'] = $_POST['SePoll-outer_cellspacing'];
    if ($options['outer_cellspacing']=="") {
    $options['outer_cellspacing']="4";
    }

	$options['outer_cellpadding'] = $_POST['SePoll-outer_cellpadding'];
    if ($options['outer_cellpadding']=="") {
    $options['outer_cellpadding']="2";
    }

	$options['inner_cellspacing'] = $_POST['SePoll-inner_cellspacing'];
    if ($options['inner_cellspacing']=="") {
    $options['inner_cellspacing']="4";
    }

	$options['inner_cellpadding'] = $_POST['SePoll-inner_cellpadding'];
    if ($options['inner_cellpadding']=="") {
    $options['inner_cellpadding']="2";
    }

	$options['cut_off'] = $_POST['SePoll-cut_off'];

    update_option("widget_SePoll", $options);
  }

?>
    <p><label for="SePoll-WidgetTitle">Widget Title: </label>
    <input class="widefat"  type="text" id="SePoll-WidgetTitle" name="SePoll-WidgetTitle" value="<?php echo $options['title'];?>" /></p>
    <p><label for="SePoll-numOfGroup">Total Polls: </label>
    <input class="widefat"  type="text" id="SePoll-numOfGroup" name="SePoll-numOfGroup" value="<?php echo $options['numOfGroup'];?>" /></p>
    <p><label for="SePoll-how_many_groups">Polls per Line: </label>
    <input class="widefat"  type="text" id="SePoll-how_many_groups" name="SePoll-how_many_groups" value="<?php echo $options['how_many_groups'];?>" /></p>
    <p><label for="SePoll-go_profile_text">User Link Title: </label>
    <input class="widefat"  type="text" id="SePoll-go_profile_text" name="SePoll-go_profile_text" value="<?php echo $options['go_profile_text'];?>" /></p>
    <p><label for="SePoll-go_profile_text1">Poll Link Title: </label>
    <input class="widefat"  type="text" id="SePoll-go_profile_text1" name="SePoll-go_profile_text1" value="<?php echo $options['go_profile_text1'];?>" /></p>
    <p><label for="SePoll-nametype">Preferred Names: </label>
    <select name="SePoll-nametype" id="SePoll-nametype">
    <option <?php if($options['nametype'] == "1"){ echo ' selected '; } ?>value="1">Username</option>
    <option <?php if($options['nametype'] == "2"){ echo ' selected '; } ?>value="2">Full Name</option>
      </select>  </p>
    <p><label for="SePoll-mainbox_border_style">Mainbox Border Style: </label>
    <select name="SePoll-mainbox_border_style" id="SePoll-mainbox_border_style">
    <option <?php if($options['mainbox_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>
    <option <?php if($options['mainbox_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>
    <option <?php if($options['mainbox_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option>
      </select>  </p>
    <p><label for="SePoll-mainbox_width">Mainbox Width (in %): </label>
    <input class="widefat"  type="text" id="SePoll-mainbox_width" name="SePoll-mainbox_width" value="<?php echo $options['mainbox_width'];?>" /></p>
    <p><label for="SePoll-mainbox_border_color">Mainbox Border Color: </label>
    <input class="widefat"  type="text" id="SePoll-mainbox_border_color" name="SePoll-mainbox_border_color" value="<?php echo $options['mainbox_border_color'];?>" /></p>
    <p><label for="SePoll-mainbox_border_dim">Mainbox Border Thickness (in px): </label>
    <input class="widefat"  type="text" id="SePoll-mainbox_border_dim" name="SePoll-mainbox_border_dim" value="<?php echo $options['mainbox_border_dim'];?>" /></p>
    <p><label for="SePoll-mainbox_bg_color">Mainbox Background Color: </label>
    <input class="widefat"  type="text" id="SePoll-mainbox_bg_color" name="SePoll-mainbox_bg_color" value="<?php echo $options['mainbox_bg_color'];?>" /></p>
    <p><label for="SePoll-box_border_style">Inner box Border Style: </label>
    <select name="SePoll-box_border_style" id="SePoll-box_border_style">
    <option <?php if($options['box_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>
    <option <?php if($options['box_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>
    <option <?php if($options['box_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option>
      </select>  </p>
    <p><label for="SePoll-box_border_color">Inner box Border Color: </label>
    <input class="widefat"  type="text" id="SePoll-box_border_color" name="SePoll-box_border_color" value="<?php echo $options['box_border_color'];?>" /></p>
    <p><label for="SePoll-box_border_dim">Inner box Border Thickness (in px): </label>
    <input class="widefat"  type="text" id="SePoll-box_border_dim" name="SePoll-box_border_dim" value="<?php echo $options['box_border_dim'];?>" /></p>
    <p><label for="SePoll-box_bg_color">Inner box Background Color: </label>
    <input class="widefat"  type="text" id="SePoll-box_bg_color" name="SePoll-box_bg_color" value="<?php echo $options['box_bg_color'];?>" /></p>
    <p><label for="SePoll-box_bg_color1">Alternate Inner box Background Color: </label>
    <input class="widefat"  type="text" id="SePoll-box_bg_color1" name="SePoll-box_bg_color1" value="<?php echo $options['box_bg_color1'];?>" /></p>
    <p><label for="SePoll-outer_cellspacing">Mainbox Cellspacing: </label>
    <input class="widefat"  type="text" id="SePoll-outer_cellspacing" name="SePoll-outer_cellspacing" value="<?php echo $options['outer_cellspacing'];?>" /></p>
    <p><label for="SePoll-outer_cellpadding">Mainbox Cellpadding: </label>
    <input class="widefat"  type="text" id="SePoll-outer_cellpadding" name="SePoll-outer_cellpadding" value="<?php echo $options['outer_cellpadding'];?>" /></p>
    <p><label for="SePoll-inner_cellspacing">Inner box Cellspacing: </label>
    <input class="widefat"  type="text" id="SePoll-inner_cellspacing" name="SePoll-inner_cellspacing" value="<?php echo $options['inner_cellspacing'];?>" /></p>
    <p><label for="SePoll-inner_cellpadding">Inner box Cellpadding: </label>
    <input class="widefat"  type="text" id="SePoll-inner_cellpadding" name="SePoll-inner_cellpadding" value="<?php echo $options['inner_cellpadding'];?>" /></p>
    <p><label for="SePoll-cut_off">Cut the Poll Title after X Chars (leave it blank for no-cut): </label>
    <input class="widefat"  type="text" id="SePoll-cut_off" name="SePoll-cut_off" value="<?php echo $options['cut_off'];?>" /></p>
    
    <input type="hidden" id="SePoll-Submit" name="SePoll-Submit" value="1" />
<?php
}


//-----------------------------------------------------------------------------
//			ACTIONS
//-----------------------------------------------------------------------------


//uninstall all options
function SePoll_uninstall () {
	delete_option('widget_SePoll');
}

function joomood_polls_uninstall () {
	delete_option('joomood_polls_options');
}

function SePoll_init()
{
  register_sidebar_widget(__('JooMood SE Polls'), 'widget_SePoll');
  register_widget_control(   'JooMood SE Polls', 'SePoll_control', 300, 200 );    
}

add_action("plugins_loaded", "SePoll_init");
add_action('admin_menu', 'joomood_polls_add_pages');

register_activation_hook( __FILE__, 'joomood_polls_install' );
register_deactivation_hook( __FILE__, 'joomood_polls_uninstall' );


?>