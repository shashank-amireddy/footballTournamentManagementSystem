# Football Tournament Management System

This Football Tournament Management System is designed to facilitate the organization and management of football tournaments. It provides functionalities to add teams, team players, jersey numbers, captains, and to create and manage matches between teams. The system stores all data in an online database using PHP.

## Features

- *Add Multiple Teams*: Easily add multiple teams participating in the tournament.
- *Manage Team Players*: Add players to each team along with their details.
- *Assign Jersey Numbers*: Assign jersey numbers to players for identification.
- *Select Captains*: Designate team captains for leadership roles.
- *Start Match Function*: Initiate matches between two teams with options to:
  - Add goals scored by each team.
  - Issue red or yellow cards to players for disciplinary actions.
  - Utilize a timer to automatically end the match or manually end it.
- *Display Winner*: Automatically display the winner of the match based on the goals scored.

## Technologies Used

- *PHP*: Backend scripting language for server-side processing and database management.
- *MySQL*: Relational database management system for storing tournament data.
- *HTML/CSS*: Frontend markup and styling for user interface.
- *JavaScript*: Client-side scripting for dynamic interactions and match timer functionality.

## Setup Instructions

1. *Clone Repository*: Clone this repository to your local machine.

```command
git clone https://github.com/shashank-amireddy/footballTournamentManagementSystem.git
```


2. *Database Configuration*: Set up your MySQL database and configure the connection details in config.php.

3. *Import Database Structure*: Import the provided SQL file into your MySQL database to create the necessary tables and schema.

bash
mysql -u username -p database_name < database_structure.sql


4. *Start the Application*: Run a local server environment (e.g., XAMPP, WAMP, MAMP) and navigate to the project directory in your browser.

5. *Use the Application*: Start managing your football tournament by adding teams, players, and matches through the user-friendly interface.

## Contributing

Contributions are welcome! If you have any suggestions, improvements, or feature requests, feel free to open an issue or create a pull request.

