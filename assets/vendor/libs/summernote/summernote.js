// Initialize Summernote
$(document).ready(function () {
  $('#content').summernote({
      height: 300, // Set the height of the editor
      placeholder: 'Write your content here...',
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'clear']],
          ['para', ['ul', 'ol']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview']],
      ]
  });
});