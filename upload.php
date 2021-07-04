

<form action="<?= $_SERVER['PHP_SELF']; ?>" method='post' enctype="multipart/form-data">
    <input type='file' name='file'>
    <input type='submit'>
</form>

<?php
	if(isset($_FILES['file'])){
		$file_name = $_FILES['file']['name'];   
		$temp_file_location = $_FILES['file']['tmp_name']; 
	

		require  'aws-module/aws-autoloader.php';;

		$s3 = new Aws\S3\S3Client([
			'region'  => 'ap-southeast-1',
			'version' => 'latest',
			'credentials' => [
				'key'    => "***************",
				'secret' => "*********************************",
			]
		]);
		
		$token = md5($file_name);
		$key = "{$token}/{$file_name}";
	
		$result = $s3->putObject([
			'Bucket' => 'satellite.geo-circle.com',
			'Key'    => $key,
			'SourceFile' => $temp_file_location,	
			'ACL' => 'public-read',
		]);
		
	echo "Done";
	}
?>


