<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$type = mysqli_real_escape_string($link, $_POST['type']);
?>
<div class="row">
	<div class="col-lg-12">
		<label>Название шаблона</label>
		<select id="template_filters" name="template_filters" class="form-control select2" style="width: 100%;">
			<?php
			$select_template = mysqli_query($link, "SELECT * FROM in_filters_template WHERE type = '$type'");
			while($get_template = mysqli_fetch_array($select_template))
			{
				?>
				<option value="<?php echo $get_template['id'] ?>"><?php echo $get_template['name']; ?></option>
				<?php
			}
			?>
		</select>
	</div>
</div>

<script>
	$('.select2').select2({
		placeholder: 'Выберите',
		tags: true
	});
</script>