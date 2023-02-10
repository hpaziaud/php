_CRT_SECURE_NO_WARNINGS

#include <iostream>

#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define FRAMES_PER_GAME 10
#define PINS_PER_FRAME 10

int roll_ball(void) {
	return rand() % (PINS_PER_FRAME + 1);
}

int main(void) {
	int score[FRAMES_PER_GAME][2];
	int total_score = 0;
	int current_frame = 0;
	int current_roll = 0;
	int i, j;
	int num_players;

	srand(time(NULL));

	printf("Enter the number of players: ");
	scanf("%d", &num_players);

	for (i = 0; i < num_players; i++) {
		printf("Player %d:\n", i + 1);
		for (current_frame = 0; current_frame < FRAMES_PER_GAME; current_frame++) {
			for (current_roll = 0; current_roll < 2; current_roll++) {
				if (current_frame == FRAMES_PER_GAME - 1 && score[current_frame][0] == PINS_PER_FRAME) {
					score[current_frame][current_roll] = roll_ball();
					if (current_roll == 1) {
						break;
					}
					score[current_frame][++current_roll] = roll_ball();
				}
				else {
					score[current_frame][current_roll] = roll_ball();
					if (current_roll == 0) {
						if (score[current_frame][current_roll] == PINS_PER_FRAME) {
							current_roll++;
						}
					}
					else {
						if (score[current_frame][0] + score[current_frame][1] >= PINS_PER_FRAME) {
							break;
						}
					}
				}
			}
		}

		total_score = 0;
		for (j = 0; j < FRAMES_PER_GAME; j++) {
			total_score += score[j][0] + score[j][1];
			if (j < FRAMES_PER_GAME - 1 && score[j][0] == PINS_PER_FRAME) {
				total_score += score[j + 1][0] + score[j + 1][1];
			}
			else if (j < FRAMES_PER_GAME - 1 && score[j][0] + score[j][1] == PINS_PER_FRAME) {
				total_score += score[j + 1][0];
			}
		}

		printf("Final score: %d\n", total_score);
	}

	return 0;
}