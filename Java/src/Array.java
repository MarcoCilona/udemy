
public class Array {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		// Array of integers with deafult values of 0
		int [] int_array = new int[3];
		
		// Assigning a value
		for(int i = 0; i < int_array.length; i++) {
			int_array[i] = i+50;
		}
		
		for (int i : int_array) {
			System.out.println(i);
		}
		
	}

}
