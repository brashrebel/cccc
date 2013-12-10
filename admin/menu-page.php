<?php
//Add the menu under Tools
add_action("admin_menu","cccc_menu");

function cccc_menu() {
	add_submenu_page("options-general.php","Caster Concepts Custom Content", "Custom Content", "manage_options","cccc", "cccc_body_fcn");
}

/*------------------
Create admin page
-------------------*/
function cccc_body_fcn() { ?>
<div class="wrap">
	<div id="icon-options-general" class="icon32">
		<br>
	</div>
	<h2>Caster Concepts Custom Content</h2>
<div class="updated">
<b>Note:</b> Important notice.
</div>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row">
	    			<h3>Getting started</h3>
	    		</th>
	    		<td>
	    			Guidelines, tips, usage, etc.
        		</td>
        	</tr>
			<tr valign="top">
				<th scope="row">
	    			<h3>One point</h3>
	    		</th>
	    		<td>
	    			Information, instructions, etc.
        		</td>
        	</tr>
    	</tbody>
    </table>
</div>
<?php }
?>