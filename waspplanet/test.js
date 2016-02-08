$(".video-1, .video-2, .video-3").on("click", function(event) {
  event.preventDefault();
  $(".video_case iframe").prop("src", $(event.currentTarget).attr("href"));
});