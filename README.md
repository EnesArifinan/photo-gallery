# Photo Gallery Project

This is a simple web application for uploading photos to a gallery and displaying them in an album format using PHP and MySQL.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction
This project demonstrates how to create a basic photo gallery application using PHP and MySQL. Users can upload photos to the gallery, and these photos are stored in a MySQL database. The gallery page displays the uploaded photos in an album format.

## Features
- Photo upload form with a title and category selection.
- Displaying uploaded photos in an album format on a separate page.

## Getting Started
Follow these instructions to get the project up and running on your local machine.

### Prerequisites
- Web server (e.g., Apache)
- PHP (version >= 5.6)
- MySQL server

### Installation
1. Clone this repository to your local machine using:
2. Configure your web server to serve the project from the repository directory.
3. ```bash
   git clone https://github.com/EnesArifinan/photo-gallery.git

## Usage
1. Open your browser and navigate to the application's homepage (e.g., `http://localhost/photo-gallery`).
2. On the homepage, you can upload photos by selecting an image file and clicking the "Gönder" (Submit) button.
3. Uploaded photos will be stored in the `uploads/` directory and their information will be added to the MySQL database.
4. Navigate to the album page (e.g., `http://localhost/photo-gallery/album.php`) to see the uploaded photos displayed in an album format.

## Contributing
Contributions are welcome! If you find any issues or have improvements to suggest, please feel free to submit a pull request.

1. Fork the repository.
2. Create a new branch for your feature/bug fix: `git checkout -b feature-name`.
3. Commit your changes: `git commit -am 'Add some feature'`.
4. Push the branch to your fork: `git push origin feature-name`.
5. Open a pull request in this repository.

## License
This project is licensed under the [MIT License](LICENSE).
