<?php
	// Modify the values in $options to fit your company/organization.
	$options = array(
		'company_name' => 'Grupo IK',
		'company_url'  => 'http://www.grupoik.com.br', 
		'email_domain' => 'grupoik.com.br', // Do not prepend with http://
		'logo_url'     => 'https://static.wixstatic.com/media/dc6c1e_6ea61b02afc84922b0f671dda78f8d7e~mv2.png/v1/fill/w_290,h_234,al_c,usm_0.66_1.00_0.01,enc_auto/dc6c1e_6ea61b02afc84922b0f671dda78f8d7e~mv2.png',  // Must be an absolute path
		'colors'       => array(
			'primary'   => '#020202', // Name, emal address, phone and address
			'secondary' => '#bd5f35', // Title/position
			'tertiary'  => '#b4b4b4'  // Horizontal border
		),
		'social_urls' => array(
					
			'instagram' => array(
				'https://www.instagram.com/grupo__ik/', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/ltzngr/Email_Signature_Generator/master/images/instagram.png'  // Must be an absolute path
			),
			'linkedin'  => array(
				'https://www.linkedin.com/company/grupoik', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/ltzngr/Email_Signature_Generator/master/images/linkedin.png'  // Must be an absolute path
			)
		),
		'address_list' => array(
			array( 'Bahia', 'Rua Vicente de Paula, 784 - Paraíso - Guanambi' ),
			),
		'hide_address_field' => false,
		'sample_data' => array(
			'full_name' => 'Adilson Moscovits',
			'position'  => 'Front-End Web Developer',
			'email_address'  => 'adilsonmoscovits@grupoik.com.br',
			'phone_number'  => '(00) 000-0000'
		)
	);
?>

<?php if( $_POST['create-signature'] ) : 

	$full_name = $_POST['full-name'];
	$position = $_POST['position'];
	$country = $_POST['country'];
	$address = $_POST['mailing-address'];
	$email_address = $_POST['email'];
	$primary_number_prefix = $_POST['primary-number-type'];
	$secondary_number_prefix = $_POST['secondary-number-type'];
	$primary_number = $_POST['primary-number'];
	$secondary_number = $_POST['secondary-number'];
?>

<!-- EMAIL SIGNATURE OUTPUT -->
<table style="width:550px; font-size:11px; font-family:Arial; margin:0; padding:0;">
	<tr>
		<td style="border-bottom: 1px solid <?php echo $options['colors']['tertiary']; ?>; padding-bottom: 14px;">
			<h2 id="full-name" style="font:bold 18px/22px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $full_name; ?></h2>
			<h3 id="position" style="font:bold 14px/16px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['secondary']; ?>; margin:0; padding:0;"><?php echo $position; ?></h3>
		</td>
	</tr>
	<tr>
		<td>
			<a style="width:125px;; margin:16px 0 8px; display:block;" href="<?php echo $options['company_url']; ?>" target="_blank" title="<?php echo $options['company_name']; ?>">
				<img src="<?php echo $options['logo_url']; ?>" alt="<?php echo $options['company_name']; ?>" width="125px;" />
			</a>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<address id="email-address" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
				<?php
					if($email_address != ''){
						$print = 'Email: <a href="mailto:'.$email_address.'@'. $options['email_domain'] .'" target="_blank" style="color:'. $options['colors']['primary'] .'; text-decoration:none;">'.$email_address.'@'. $options['email_domain'] .'</a>';
						echo $print;
					}
				?>
			</address>
			<address style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
				<?php
					if($secondary_number != ''){
						$print = $primary_number_prefix.': '.$primary_number.' | '.$secondary_number_prefix.': '.$secondary_number;
					}
					else{
						$print = $primary_number_prefix.': '.$primary_number;
					}
					echo $print;
				?>
			</address>
			<?php if( !$options['hide_address_field'] ) : ?>
				<address style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
					<?php 
						if($address != ''){
							echo $address;
						}
					?>
				</address>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td style="padding-top: 10px;">
			<?php if( $options['social_urls']['instagram'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['instagram'][0]; ?>" target="_blank" title="Instagram" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['instagram'][1]; ?>" alt="Instagram" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['linkedin'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['linkedin'][0]; ?>" target="_blank" title="LinkedIn" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['linkedin'][1]; ?>" alt="LinkedIn" width="18px" height="18px" />
				</a>
			<?php endif; ?>
		</td>
	</tr>
</table>

<?php else : ?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Grupo IK - Gerador de Assinatura de Email</title>

	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div class="page-header">
		<h1>Gerador de Assinatura de Email</h1>
		
	</div>

	<!-- EMAIL SIGNATURE DETAILS -->
	<form id="email-signature-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" target="_blank" autocomplete="off">
		<br>
		<p>Por favor, use o formulário abaixo para criar sua assinatura de email. Siga as intruções no final dessa pagina para adicionar a assinatura em seu cliente de email. O que estiver em * é um campo obrigatório, favor preencher.</p><br>

		<table class="contact-details" width="100%" cellspacing="8" style="margin: 0 auto;">
			<tr>
				<td width="200px"><label for="full-name">Nome Completo *</label></td>
				<td colspan="2"><input type="text" name="full-name" /></td>
			</tr>
			<tr>
				<td><label for="position">Cargo *</label></td>
				<td colspan="2"><input type="text" name="position" /></td>
			</tr>
			<?php if( !$options['hide_address_field'] ) : ?>
				<tr>
					<td><label for="country">Estado *</label></td>
					<td colspan="2">
						<select name="country">
							<option selected disabled>-- Selecione --</option>
							<?php foreach( $options['address_list'] as $address ) : ?>
								<option value="<?php echo $address[0]; ?>"><?php echo $address[0]; ?></option>
							<?php endforeach; ?>
						</select>
						<input name="mailing-address" type="hidden" value="" />
					</td>
				</tr>
			<?php endif; ?>
			<tr>
				<td><label for="email">Email *</label></td>
				<td colspan="2">
					<input class="email-user" type="text" name="email" maxlength="50" />
					<span class="email-domain">@<?php echo $options['email_domain']; ?></span>
				</td>
			</tr>
			<tr>
				<td><label for="primary-number">Telefone Primario *</label></td>
				<td width="95px">
					<select name="primary-number-type" style="background-position: 92% center;">
						<option value="Phone" selected>Telefone Fixo</option>
						<option value="Office">Trabalho</option>
						<option value="Mobile">Celular</option>
						<option value="Fax">Fax</option>
					</select>
				</td>
				<td><input type="text" name="primary-number" /></td>
			</tr>
			<tr>
				<td><label for="secondary-number">Telefone Secundario</label></td>
				<td width="95px">
					<select name="secondary-number-type" style="background-position: 92% center;">
						<option value="Phone">Telefone Fixo</option>
						<option value="Office">Trabalho</option>
						<option value="Mobile" selected>Celular</option>
						<option value="Fax">Fax</option>
					</select>
				</td>
				<td><input type="text" name="secondary-number" maxlength="30" /></td>
			</tr>
		</table>

		<!-- EMAIL SIGNATURE PREVIEW -->
		<div class="signature-preview">
			<table style="width:100%;">
				<tr>
					<td style="border-bottom: 1px solid <?php echo $options['colors']['tertiary']; ?>; padding-bottom: 14px;">
						<h2 id="full-name" style="font:bold 18px/22px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $options['sample_data']['full_name']; ?></h2>
						<h3 id="position" style="font:bold 14px/16px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['secondary']; ?>; margin:0; padding:0;"><?php echo $options['sample_data']['position']; ?></h3>
					</td>
				</tr>
				<tr>
					<td>
						<a style="width:125px; margin:16px 0 8px; display:block;" href="<?php echo $options['company_url']; ?>" target="_blank" title="<?php echo $options['company_name']; ?>">
							<img src="<?php echo $options['logo_url']; ?>" alt="<?php echo $options['company_name']; ?>" width="125px" />
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<address id="email-address" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
							<?php echo 'Email: ' . $options['sample_data']['email_address']; ?>
						</address>
						<address id="phone-number" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
							<?php echo 'Phone: ' . $options['sample_data']['phone_number']; ?>
						</address>
						<?php if( !$options['hide_address_field'] ) : ?>
							<address id="address" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>">
								<?php echo $options['address_list'][0][1]; ?>
							</address>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td style="padding-top: 10px;">
																
						<?php if( $options['social_urls']['instagram'][0] != '' ) : ?>
							<a href="<?php echo $options['social_urls']['instagram'][0]; ?>" target="_blank" title="Instagram" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['social_urls']['instagram'][1]; ?>" alt="Instagram" width="18px" height="18px" />
							</a>
						<?php endif; ?>
						<?php if( $options['social_urls']['linkedin'][0] != '' ) : ?>
							<a href="<?php echo $options['social_urls']['linkedin'][0]; ?>" target="_blank" title="LinkedIn" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['social_urls']['linkedin'][1]; ?>" alt="LinkedIn" width="18px" height="18px" />
							</a>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		</div>

		<table width="100%" cellspacing="8" style="padding-top:20px;">
			<tr>
				<td width="65%">
					<p>Na nova janela, pressione <strong>CTL + A</strong> (Windows) ou <strong>CMD + A</strong> (Mac) para selecionar o conteúdo. <strong>Copie e depois Cole </strong> o conteúdo no seu client de email usando um dos links abaixo.<p>
				</td>
				<td width="35%">
					<input type="submit" name="create-signature" value="Criar Assinatura" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br><br>
					<ul class="client-links">
						<li><a href="https://king.host/wiki/artigo/assinatura-no-roundcube/" target="_blank">KingHost</a></li>
					</ul>
				</td>
			</tr>
		</table>
	</form>
</body>

<!-- JavaScript Files Go Here -->
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
	$(function(){

		//FORM SUBMISSION
		$('#email-signature-form').submit(function(){
			var full_name = $('#email-signature-form input[name="full-name"]').val();
			var position = $('#email-signature-form input[name="position"]').val();

			<?php if( !$options['hide_address_field'] ) : ?>
			var country = $('#email-signature-form select[name="country"]').val();
			<?php endif; ?>

			var email_address = $('#email-signature-form input[name="email"]').val();
			var primary_number_prefix = $('#email-signature-form select[name="primary-number-type"]').val();
			var primary_number = $('#email-signature-form input[name="primary-number"]').val();
			var secondary_number_prefix = $('#email-signature-form select[name="secondary-number-type"]').val();
			var secondary_number = $('#email-signature-form input[name="secondary-number"]').val();

			if(full_name != '' && position != ''){
				if(country != null){
					if(email_address != ''){
						if(primary_number != ''){
							if(secondary_number == ''){
								return true;
							}
							else{
								if(primary_number_prefix != secondary_number_prefix && primary_number != secondary_number){
									return true;
								}
								else{
									alert('You may not use the same phone number/type twice.');
									return false;
								}
							}
						}
						else{
							alert('Please enter a primary phone number.');
							return false;
						}
					}
					else{
						alert('Please enter an email address.');
						return false;
					}
				}
				else{
					alert('Please select a country.');
					return false;
				}
			}
			else{
				alert('Please fill in your name and job title/position.');
				return false;
			}
		});

		// SIGNATURE PREVIEW LISTENER
		$('input[name="full-name"], input[name="position"], input[name="address"], input[name="email"], input[name="primary-number"], input[name="secondary-number"]').keyup(function(){
			input_field_callback();
		});

		$('select[name="country"], select[name="primary-number-type"], select[name="secondary-number-type"]').change(function(){
			input_field_callback();
		});

		function input_field_callback(){
			var full_name = $('#email-signature-form input[name="full-name"]').val();
			var position = $('#email-signature-form input[name="position"]').val();
			
			<?php if( !$options['hide_address_field'] ) : ?>
			var country = $('#email-signature-form select[name="country"]').val();
			<?php endif; ?>

			var email_address = $('#email-signature-form input[name="email"]').val();
			var primary_number_prefix = $('#email-signature-form select[name="primary-number-type"]').val();
			var primary_number = $('#email-signature-form input[name="primary-number"]').val();
			var secondary_number_prefix = $('#email-signature-form select[name="secondary-number-type"]').val();
			var secondary_number = $('#email-signature-form input[name="secondary-number"]').val();

			var email_domain = '<?php echo $options['email_domain']; ?>';

			if(full_name != ''){
				$('#full-name').text(full_name);
			}
			else{
				$('#full-name').text('<?php echo $options['sample_data']['full_name']; ?>');
			}

			if(position != ''){
				$('#position').text(position);
			}
			else{
				$('#position').text('<?php echo $options['sample_data']['position']; ?>');
			}

			<?php if( !$options['hide_address_field'] ) : ?>
				<?php foreach( $options['address_list'] as $address ) : ?>

					if(country == '<?php echo $address[0]; ?>'){
						mailing_address = '<?php echo $address[1]; ?>';
						$('#address').text(mailing_address);
						$('#email-signature-form input[name="mailing-address"]').val(mailing_address);
					}

				<?php endforeach; ?>
			<?php endif; ?>


			if(email_address != ''){
				$('#email-address').html('Email: <a href="mailto:' + email_address + '@'+ email_domain +'" target="_blank">' + email_address + '@'+ email_domain +'</a>');
			}
			else{
				$('#email-address').html('<?php echo "Email: " . $options["sample_data"]["email_address"]; ?>');
			}

			if(primary_number != ''){
				if(secondary_number != ''){
					$('#phone-number').html(primary_number_prefix + ': ' + primary_number + ' | ' + secondary_number_prefix + ': ' + secondary_number);
				}
				else{
					$('#phone-number').text(primary_number_prefix + ': ' + primary_number);
				}
			}
			else{
				$('#phone-number').html('<?php echo "Phone: " . $options["sample_data"]["phone_number"]; ?>');
			}
		}
	});
</script>
</html>
<?php endif; ?>