<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card with Overflow Notifications</title>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <style>
    /* Adjust the card height to your preference */
    .card {
      height: 300px;
    }

    /* Add a little margin to the view more link */
    .view-more {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-1">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Notifications</h5>
            <div class="overflow-auto">
              <ul class="list-group">
                <!-- Sample notifications -->
                <li class="list-group-item">Notification 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li class="list-group-item">Notification 2: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                <li class="list-group-item">Notification 3: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <!-- Add more notifications here -->
              </ul>
            </div>
            <div class="view-more text-center">
              <a href="#" onclick="loadMoreNotifications()">View More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Bootstrap JS and Popper.js scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

  <script>
    function loadMoreNotifications() {
      // Simulate loading more notifications
      const notificationList = document.querySelector('.list-group');
      for (let i = 4; i <= 10; i++) {
        const notificationItem = document.createElement('li');
        notificationItem.classList.add('list-group-item');
        notificationItem.textContent = `Notification ${i}: This is notification number ${i}.`;
        notificationList.appendChild(notificationItem);
      }
    }
  </script>
</body>
</html>
