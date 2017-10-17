// func_ptr.c -- uses function pointers

#include <stdio.h>
#include <string.h>
#include <ctype.h>

#define DEBUG 1
//expected expression before ‘...’ token
// could not contain any white space between LOG_MSG and (...)
#ifdef DEBUG
#    define LOG_MSG printf
#else
#	define LOG_MSG(...)
#endif

// func_ptr.c -- uses function pointers
#define DEBUG 1
//expected expression before ‘...’ token
// could not contain any white space between LOG_MSG and (...)
#ifdef DEBUG
#define LOG_MSG printf
#else
#define LOG_MSG(...)
#endif

char showmenu(void);
void eatline(void); // read through end of line
void show(void (*fp)(char *), char * str);
void ToUpper(char *); // convert string to uppercase
void ToLower(char *); // convert string to uppercase
void Transpose(char *); // transpose cases
void Dummy(char *); // leave string unaltered

int main() {
	char line[81];
	char copy[81];
	char choice;
	void (*pfun)(char *);
	puts("Enter a string (empty line to quit):");
	while (fgets(line, sizeof(line), stdin)) {
		// end by empty line
		if (*line == '\n')
			break;
		LOG_MSG("line is: %s\n", line);
		while ('n' != (choice = showmenu())) {
			switch (choice) {
			case 'u':
				pfun = ToUpper;
				break;
			case 'l':
				pfun = ToLower;
				break;
			case 't':
				pfun = Transpose;
				break;
			case 'o':
				pfun = Dummy;
				break;
			default:
				break;
			}
			strcpy(copy, line);
			show(pfun, copy);
		}
		puts("Enter a string (empty line to quit):");
	}
	puts("Bye!");
	return 0;
}

char showmenu() {
	char action;
	fprintf(stdout, "Usage:"
			"u upperCase\n"
			"l lowerCase\n"
			"t transpose case\n"
			"o original case\n"
			"n next string\n");
	action = getchar();
	action = tolower(action);
	// dispose the rest of line
	eatline();
	while (strchr("ulton", action) == NULL) {
		fprintf(stdout, "Usage:"
				"u upperCase\n"
				"l lowerCase\n"
				"t transpose case\n"
				"o original case\n"
				"n next string\n");
		action = tolower(action);
		eatline();
	}
	return action;
}

void eatline(void) {
	while (getchar() != '\n')
		continue;
}

void ToUpper(char *str) {
	while (*str) {
		// Return the upper case version of C
		*str = toupper(*str);
		str++;
	}
}

void ToLower(char *str) {
	while (*str) {
		*str = tolower(*str);
		str++;
	}
}

void Transpose(char *str) {
//	ulti-character character constant
//	LOG_MSG('%c',*str);
	LOG_MSG("first letter is:%c ", *str);
	while (*str) {
		if (isupper(*str))
			*str = tolower(*str);
		else if (islower(*str))
			*str = toupper(*str);
		str++;
	}
}

void Dummy(char * str) {
// leaves string unchanged
}

void show(void (*fp)(char *), char * str) {
	(*fp)(str); // apply chosen function to str
	puts(str); // display result
}
