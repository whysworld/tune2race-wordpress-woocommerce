<?php
$which_form_posted = isset($_POST['which-form']) ? $_POST['which-form'] : '';
?>
<div id="jsErrorMsg" class="bg-red txt-white px-3 py-2 mb-3 txt-center <?php if (!$form_error && $which_form_posted != $which_form) { echo 'hidden'; } ?>">Some of the fields were not entered correctly.</div>
<label for="contact-name" class="label">Your name</label>
<input class="input-txt mb-3 jsCompulsoryField <?php field_error_style($form_error, $which_form, 'contact-name', 'required'); ?>" id="contact-name" name="contact-name" type="text"
  value="<?=isset($_POST["contact-name"]) ? $_POST["contact-name"] : ''?>">
<label for="contact-email" class="label">Your email</label>
<input class="input-txt mb-3 jsEmailField <?php field_error_style($form_error, $which_form, 'contact-email', 'email'); ?>" id="contact-email" name="contact-email" type="email"
  value="<?=isset($_POST["contact-email"]) ? $_POST["contact-email"] : ''?>">
<label for="contact-tel" class="label">Your number <span class="txt-xs txt-muted">(optional)</span></label>
<input class="input-txt mb-3" id="contact-tel" name="contact-tel" type="tel"
  value="<?=isset($_POST["contact-tel"]) ? $_POST["contact-tel"] : ''?>">
<label for="contact-city" class="label">Your closest city</label>
<input class="input-txt mb-3 jsCompulsoryField <?php field_error_style($form_error, $which_form, 'contact-city', 'required'); ?>" id="contact-city" name="contact-city" type="text"
  value="<?=isset($_POST["contact-city"]) ? $_POST["contact-city"] : ''?>">
<label for="contact-msg" class="label">Your message <span class="txt-xs txt-muted">(optional)</span></label>
<textarea id="contact-msg" name="contact-msg" class="input-txt text-area mb-3">
  <?=isset($_POST["contact-msg"]) ? $_POST["contact-msg"] : ''?>
</textarea>