<?php
ob_start();

function errorDisplay($error){
	if(!empty(@$_POST[$error])){ foreach(@$_POST[$error] as $value){ echo $value . " "; } }
}
?>

<section>
	<h1>Insert a Comic</h1>
        <form class='form' method='POST' action="index.php?action=insertComicFunction">
	 	<div class="container">
		  <label>Romaji title* : </label><input type="text" name="inputRoTitle" required>
		  <?=errorDisplay('inputRoTitle_Error');?><br>

		  <label>English title : </label><input type="text" name="inputEnTitle">
		  <?=errorDisplay('inputEnTitle_Error');?><br>

		  <label>English synopsis : </label><input type="text" name="inputEnSynopsis">
		  <?=errorDisplay('inputEnSynopsis_Error');?><br>

		  <label>Japanese title : </label><input type="text" name="inputJpTitle">
		  <?=errorDisplay('inputJpTitle_Error');?><br>

		  <label>Japanese synopsis : </label><input type="text" name="inputJpSynopsis">
		  <?=errorDisplay('inputJpSynopsis_Error');?><br>
		  
		  <label>French title : </label><input type="text" name="inputFrTitle">
		  <?=errorDisplay('inputFrTitle_Error');?><br>

		  <label>French synopsis : </label><input type="text" name="inputFrSynopsis">
		  <?=errorDisplay('inputFrSynopsis_Error');?><br>

		  <label>Synonyms : </label><input type="text" name="inputSynonyms">
		  <?=errorDisplay('inputSynonyms_Error');?><br>

		  <label>Number of episodes : </label><input type="number" name="inputEpisodes"><br>
		  <label>Start airing : </label><input type="date" name="inputStartAiring"><br>
		  <label>End airing : </label><input type="date" name="inputEndAiring"><br>
		  <label>Broadcast : </label><input type="text" name="inputBroadcast">
		  <?=errorDisplay('inputBroadcast_Error');?><br>

		  <label>Source : </label><input type="text" name="inputSource">
		  <?=errorDisplay('inputSource_Error');?><br>

		  <label>Duration per episode : </label><input type="number" name="inputDuration"><br>
		  <label>Type</label>
		  <select name="inputComicType">
		  	<option value="" selected>Choose</option>
		  	<?php foreach($getComicTypesFunction_Result as $result){ echo '<option value="'. $result['id'] .'">'. $result['name'] .'</option>'; }?>
		  </select><br>
	  	  <input type="submit" value="Submit">
		</div>
	</form>
</section>

<?php
  $content = ob_get_clean();
  require "gabarit.php";
?>