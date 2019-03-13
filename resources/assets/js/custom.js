function closeMessagein5s() {

    setTimeout(() => {
        $( "#message-popup" ).hide( "slow", () => {});
    }, 5000);

}


module.exports = {
    closeMessagein5s
};