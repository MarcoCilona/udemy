import java.util.Scanner;

public class Scanner_input {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String name;
		
		// Create scanner obj to read user input
		Scanner input = new Scanner(System.in);
		
		// Output the prompt
		System.out.println("Insert your name");
		
		// Wait for user to enter a line of text
		name = input.nextLine();
		
		System.out.println("Hello " + name);
		
		input.close();
	}

}
