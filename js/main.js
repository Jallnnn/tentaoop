$(function() {

	$(".play").click(function(){
		var playerName = $('.characterName').val();
		var playerClass = ($("input[type='radio']:checked").val());
		$.ajax({
			url:"start_game.php",
			dataType:"json",
			data: {
				playerName: playerName,
				playerClass: playerClass
			},
			success: function(data) {

				$(".characterInfo").hide();
				for (var i = 0; i < data.length; i++) {
					for (var j = 0; j < data[i].length; j++) {


						$(".selectNewChallenge").append("<h2>Welcome " + data[i][j].name + " to the League of Legends game!");
						$(".selectNewChallenge").append("<p>Choose your challenge by accepting or hit pick a new challenge if you want to do another challenge</p>");
						$(".selectNewChallenge").append("<button class='accept_challenge'>Accept challenge</button>");
						$(".selectNewChallenge").append("<button class='pick_new_challenge'>I want a new challenge");

						console.log("YAY! stored in database", data);
					}
				}
						$(".pick_new_challenge").on("click", pickNewChallenge);
						$(".accept_challenge").on("click", function() {
							acceptChallenge();
						});
			},
			error: function(data) {
				console.log("Hey! Something went wrong here!", data);
			}
		});
	});
		
		function acceptChallenge(companion_no) {

			$.ajax({
				url: "carryout_challenge.php",
				dataType: "json",
				data: {
					chosen_companion: companion_no
				},
				success: function(data) {
					$(".playChallenge").html(""+"<br>");


					for (var i in data.playing) {
						$(".playChallenge").append(data.playing[i]);
					}
					for (var j in data.result) {
						

						
					}
						$(".playChallenge").append("The winner of the challenge is: "+data.result[0].name+" You gained 15 success points"+"<br>"+data.result[0].name+" har nu "+data.result[0].success+" poäng.<br><br>");
						$(".playChallenge").append("Second place goes to: "+data.result[1].name+" You gained nor lost any success points"+"<br>"+data.result[1].name+" har nu "+data.result[1].success+" poäng.<br><br>");
						$(".playChallenge").append("Last place goes to: "+data.result[2].name+" You lost 5 success points"+"<br>"+data.result[2].name+" har nu "+data.result[2].success+" poäng.<br><br>");
						


						console.log("Carried out challenge", data);
				},
				error: function(data) {
					console.log("Did not carry out challenge", data.responseText);
				}
			});
		}
		

		function pickNewChallenge() {

			$.ajax({
				url: "get_challenges.php",
				dataType: "json",
				data: {
					getChallenge: 1
				},
				success: function(data) {
					$(".random").html("");
					$(".selectNewChallenge").append("<p class='random'>" + data.description + "</p>");
					
					for (var i in data.skills) {
						$(".selectNewChallenge").append("<p class='random'>"+i+": "+data.skills[i]+"</p>");
					}
				},
				error: function(data) {
					console.log("It didnt work!", data.responseText);
				}
		
			});
		}

	$(".reset").click(function(){
		$.ajax({
			url:"reset.php",
			dataType:"json",
			data: {
				startOver: 1
			},
			success: function(data){
				$(".characterName").val("");
				$("input:radio").attr("checked", false);
				console.log("YAY! you have reset the game!");
			},
			error: function(data) {
				console.log("Hey! You did not reset the game!", data);
			}
		});
	});

});