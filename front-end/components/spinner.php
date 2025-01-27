 <style>
     .loading-spinner {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         width: 100%;
         position: fixed;
         top: 0;
         left: 0;
         background-color: rgba(32, 32, 29, 0.7);
         z-index: 9999;
     }

     .loading-spinner::after {
         content: "";
         width: 100px;
         height: 100px;
         border: 14px solid rgba(172, 153, 206, 0.7);
         border-top: 14px solid rgb(8, 92, 49);
         border-radius: 50%;
         animation: spin 1s linear infinite;
     }

     @keyframes spin {
         0% {
             transform: rotate(0deg);
         }

         100% {
             transform: rotate(360deg);
         }
     }

     #loading-spinner {
         display: none;
     }
 </style>

 <div class="loading-spinner" id="loading-spinner"></div>

 <script>
     function showSpinner() {
         document.getElementById("loading-spinner").style.display = "flex";
     }

     function hideSpinner() {
         document.getElementById("loading-spinner").style.display = "none";

     }
 </script>