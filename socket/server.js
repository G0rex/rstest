
var Redis = require('ioredis'),
    redis = new Redis();
redis.psubscribe('*',function(error,count){

});
redis.on('pmessage',function(pattern,channel,message){
    console.log(message,channel);
});