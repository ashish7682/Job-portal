<?php
require_once '../vendor/autoload.php';
require_once './Database.php';


$db = Database::getInstance();

$faker = Faker\Factory::create();

$faker->addProvider(new Faker\Provider\en_US\Person($faker));
$faker->addProvider(new Faker\Provider\en_US\Address($faker));
$faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
$faker->addProvider(new Faker\Provider\en_US\Company($faker));
$faker->addProvider(new Faker\Provider\Lorem($faker));
$faker->addProvider(new Faker\Provider\Internet($faker));

define('MAXDATA', 10);

echo 'Cleaning old data...'.PHP_EOL;

$sql = "TRUNCATE TABLE recruiter";
$db->query($sql);

$sql = "TRUNCATE TABLE city";
$db->query($sql);
$sql = "TRUNCATE TABLE sector";
$db->query($sql);

$sql = "TRUNCATE TABLE jobs";
$db->query($sql);

echo "\e[32m[OK] \e[39mCleaning done...".PHP_EOL;

echo "Inserting Recuiter table data...".PHP_EOL;
for ($i = 0; $i < MAXDATA; $i++) {
	$name = $faker->company;
	$email = $faker->email;
	$phone = $faker->phoneNumber;
	$city = $faker->city;
	$state = $faker->state;
	$pin = $faker->randomNumber(6);
	$address = $faker->address;
	$photo = $faker->imageUrl($width = 64, $height = 64);
	$password = password_hash('password', PASSWORD_DEFAULT);

	$sql = "INSERT INTO recruiter (
			email, name, phone, city, state, pin, address, photo, password
		) VALUES (
			'$email', '$name', '$phone', '$city', '$state', '$pin', '$address', '$photo', '$password'
	)";

	$db->query($sql);
}

echo "\e[32m[OK] \e[39mRecruiter table data inserted".PHP_EOL;
echo 'Inserting sector table data.....'.PHP_EOL;
for ($i = 0; $i < MAXDATA; $i++) {
	$name = $faker->jobTitle;

	$sql = "INSERT INTO sector (name) VALUES ('$name')";

	$db->query($sql);
}
echo "\e[32m[OK] \e[39mSector table data inserted....".PHP_EOL;

echo 'Inserting City table data.....'.PHP_EOL;
for ($i = 0; $i < MAXDATA; $i++) {
	$name = $faker->city;

	$sql = "INSERT INTO city (name) VALUES ('$name')";

	$db->query($sql);
}

echo "\e[32m[OK] \e[39mCity table data inserted....".PHP_EOL;
echo "Inserting Jobs table data....".PHP_EOL;
for ($i = 0; $i < (MAXDATA * 5); $i++) {
	$title = $faker->jobTitle;
	$sector = rand(1, 10);
	$city = rand(1, 10);
	$desc = $db->real_escape_string($faker->realText($maxNbChars = 1000, $indexSize = 2));
	$type = 'Full time';
	$ctc = $faker->randomNumber(5);
	$imageUrl = $faker->imageUrl($width = 700, $height = 500 );
	$experience = rand(0,10);
	$qualification = $faker->jobTitle;
	$deadline = $faker->dateTime()->format('d-m-Y');
	$requirements = $db->real_escape_string($faker->realText($maxNbChars = 1000, $indexSize = 2));
	$howToApply = $db->real_escape_string($faker->realText($maxNbChars = 1000, $indexSize = 2));
	$rec = rand(1, 10);

	$sql = "INSERT INTO jobs (title, sector, city, description, type, ctc, image, exp, qualification, deadline, requirement, how_to_apply, recruiter)
			VALUES ('$title', '$sector', '$city', '$desc',  '$type', '$ctc', '$imageUrl',  '$experience', '$qualification', '$deadline', '$requirements', '$howToApply','$rec')";
	$db->query($sql);
}

echo "\e[32m[OK] \e[39m Jobs table data inserted...".PHP_EOL;

echo "Inserting User table data....".PHP_EOL;
for($i = 0; $i< MAXDATA; $i++){
	$email = $faker->email;
	$password = password_hash('password', PASSWORD_DEFAULT);
	$sql = "INSERT INTO users (email, password) VALUES ('$email','$password')";
	$db->query($sql);
}
echo "\e[32m[OK] \e[39m User table data inserted...".PHP_EOL;
