<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        .camera {
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
        }

        .camera h2 {
            margin: 0;
            font-size: 1.5em;
            color: #007BFF;
        }

        .camera p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <h1>Camera Information</h1>

    <?php
    class Camera
    {
        protected $brand;
        protected $model;
        protected $year;

        // Constructor
        public function __construct($brand, $model, $year)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->year = $year;
        }

        // Method
        public function getDetails()
        {
            return "Brand: $this->brand, Model: $this->model, Year: $this->year";
        }

        // Method
        public function takePhoto()
        {
            return "Taking a photo with $this->brand $this->model...";
        }
    }

    // Kelas Turunan DSLR
    class DSLR extends Camera
    {
        private $lensType;
        private $isFullFrame;

        // Constructor 
        public function __construct($brand, $model, $year, $lensType, $isFullFrame)
        {
            // Memanggil constructor parent class (Camera)
            parent::__construct($brand, $model, $year);
            $this->lensType = $lensType;
            $this->isFullFrame = $isFullFrame;
        }

        public function getDetails()
        {
            $frameType = $this->isFullFrame ? "Full Frame" : "Crop Sensor";
            return parent::getDetails() . ", Lens Type: $this->lensType, Frame Type: $frameType";
        }

        public function shootVideo()
        {
            return "$this->brand $this->model is shooting video!";
        }
    }

    // Contoh Penggunaan OOP
    $camera = new Camera("Canon", "PowerShot", 2020);
    $dslr = new DSLR("Nikon", "D750", 2015, "50mm f/1.8", true);
    ?>

    <div class="camera">
        <h2>Camera</h2>
        <p><?php echo $camera->getDetails(); ?></p>
        <p><?php echo $camera->takePhoto(); ?></p>
    </div>

    <div class="camera">
        <h2>DSLR</h2>
        <p><?php echo $dslr->getDetails(); ?></p>
        <p><?php echo $dslr->takePhoto(); ?></p>
        <p><?php echo $dslr->shootVideo(); ?></p>
    </div>

</body>

</html>
