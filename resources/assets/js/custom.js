function closeMessagein5s() {
    console.log('test');
    setTimeout(() => {
        console.log('test2');
        $("#message-popup").hide( "slow", () => {});
    }, 5000);

}

$('#fav_btn_a').click(() => {
    if ($("#fav_btn").hasClass("on") == true) {
        $("#fav_btn").parent().prop('title', 'Mark as favourite');
        $("#fav_btn").removeClass("on").addClass("off");
    } else {
        $("#fav_btn").parent().prop('title', 'Unmark as favourite');
        $("#fav_btn").removeClass("off").addClass("on");
    }
});


$('.answer_vote_control').on("click", ".correct_i", function(e){
    if ($(this).hasClass("on_best_answer") == true) {
        $(this).parent().prop('title', 'Mark as best answer');
        $(this).removeClass("on_best_answer").addClass("off_best_answer");
    } else {
        $(this).parent().prop('title', 'Unmark as best answer');
        $(this).removeClass("off_best_answer").addClass("on_best_answer");
    }
});

module.exports = {
    closeMessagein5s
};