var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        "../../public/image/bg/1.jpg",
		        "../../public/image/bg/2.jpg",
		        "../../public/image/bg/3.jpg",
		        "../../public/image/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();