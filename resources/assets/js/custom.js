function closeMessagein5s() {
    console.log('test');
    setTimeout(() => {
        console.log('test2');
        $("#message-popup").hide( "slow", () => {});
    }, 5000);

}


module.exports = {
    closeMessagein5s
};