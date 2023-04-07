<!DOCTYPE html>
<html>
<head>
  <style>
    #loading-screen {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255,255,255,0.5);
      z-index: 9999;
    }

    .spinner {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      animation: spin 1s linear infinite;
    }

    .loading-text {
      margin-top: 10px;
      font-size: 28px;
      font-weight: 700;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>
<body>
  <div id="loading-screen">
    <div class="spinner"></div>
    <div class="loading-text">Loading...</div>
  </div>

  <script>
    window.addEventListener('load', function() {
      var loader = document.getElementById('loading-screen');
      setTimeout(function() {
        loader.style.display = 'none';
      }, 1000); // replace 2000 with the time in milliseconds it takes for your content to load
    });
  </script>
</body>
</html>
