import java.util.Scanner;

public class Array {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		Scanner input = new Scanner(System.in);
		
		// Array of integers with deafult values of 0
		int [] int_array = new int[3];
		
		System.out.println("Insert the values: ");
		// Assigning a value
		for(int i = 0; i < int_array.length; i++) {
			int_array[i] = input.nextInt();
		}
		
		for (int i : int_array) {
			System.out.println(i);
		}
		
		input.close();
	}

}
