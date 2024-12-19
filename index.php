<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
 
</head>
<link rel="stylesheet" href="style.css">
<body>
    <!-- Navbar
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-book"></i> Guestbook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- Guestbook Form -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Guestbook</h2>
        <form action="add.php" method="POST">
            <div class="mb-3">
                <label for="guestId" class="form-label"><i class="fas fa-id-badge"></i> Guest ID</label>
                <input type="text" class="form-control" id="guestId" name="guest_id" placeholder="Enter your guest ID" required>
            </div>
            <div class="mb-3">
                <label for="guestName" class="form-label"><i class="fas fa-user"></i> Name</label>
                <input type="text" class="form-control" id="guestName" name="guest_name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="guestEmail" class="form-label"><i class="fas fa-envelope"></i> Gmail</label>
                <input type="email" class="form-control" id="guestEmail" name="guest_email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="guestComments" class="form-label"><i class="fas fa-comment"></i> Comments</label>
                <textarea class="form-control" id="guestComments" name="guest_comments" rows="4" placeholder="Leave your comments here" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i> Submit</button>
        </form>
    </div>

    <!-- Footer
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2024 Guestbook <p class="font-weight-bold">Created by Naveed BSCSE-22-39</p> | All Rights Reserved</p>
            <div>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
