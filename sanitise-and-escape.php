<?php 
	
namespace Sanitize_And_Escape_Me;

class Results {
	public function output_form(){
		?> 
 		<form method="post" action="save_contact_info">
			<table>
				<tr>
					<td>
						<label for="name">Name</label> 
					</td>
					<td>
						<input type="text" id="name" name="name">
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">Email</label> 
					</td>
					<td>
						<input type="text" id="email" name="email">
					</td>
				</tr>
				<tr>
					<td>
						<label for="website">Website</label> 
					</td>
					<td>
						<input type="text" id="website" name="website">
					</td>
				</tr>								
			</table>
 		</form> 
 		<?php 
	}
	public function output_results(){
		?> 
 		<b>Your information has been received. Thank you.</b> 
 		<br /> 
 		<br /> 
		 
 		Name:  <?php echo esc_html( $_POST['name'] ); ?> 
 		<br /> 
 		Email: <?php echo esc_html( $_POST['email'] ); ?> 
 		<br /> 
 		Website: <?php echo esc_html( $_POST['website'] ); ?> 
 		<br />  
	<?php 
	}
	public function save_results(){
		$form_name    = sanitize_text_field( $_POST['name'] ); 
 		$form_email   = sanitize_text_field( $_POST['email'] ); 
 		$form_website = sanitize_text_field( $_POST['website'] ); 
  
 		update_option( 'form_contact_name', $form_name ); 
 		update_option( 'form_contact_email', $form_email ); 
 		update_option( 'form_contact_website', $form_website ); 
	}
}

?>