// buildLeaderboard() is called by the JSON feed from Google Spreadsheet

function buildLeaderboard(json) 
{
	console.log('buildLeaderboard')
	// console.log(json.feed.entry)

	// let's declare a few variables we'll need to build the leaderboard
	var teams = [], // an array of teams
		sortedTeams, // ann array of teams sorted by score (higher to lower, of course)
		$ = jQuery, // a reference to jQuery (WP otherwise chokes it)
		$ol= $('#leaderboard ol.teams'), // a reference to the DOM element (ordered list) where we'll inject score data
		template = _.template($('#team-template').html()) // an Underscore template object

	// we want to loop through the json.feed.entry array
	_(json.feed.entry).each(function (entry)
	{
		// entry represents a row in the spreadsheet

		// console.log(entry)

		// we need the team name and their score
		var score = Number(entry.gsx$score.$t),
			teamName = entry.gsx$team.$t

		// let's build a tidy object with all the team's data
		var team = 
		{
			score: score,
			name: teamName
		}

		// ... and add it to the teams array
		teams.push(team)

		// console.log(teamName + ' ' + score)
	})

	// console.log(teams)

	// using Underscore, we can sort the teams by score
	sortedTeams = _(teams).sortBy(function(team){ return - team.score})

	// console.log(sortedTeams)

	// empty the list
	$ol.empty()

	// let's loop through the teams
	_(sortedTeams).each(function(team)
	{
		// using Underscore, we can inject team data in the template 
		var html = template(team)

		// then append the team score to the ordered list in the page
		$ol.append(html)
	})
}