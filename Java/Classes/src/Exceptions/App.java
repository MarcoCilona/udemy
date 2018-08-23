package Exceptions;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;

public class App {

	public static void main(String[] args) throws FileNotFoundException {
		// TODO Auto-generated method stub
		 File file = new File("test.text");
		 
		 FileReader fr = new FileReader(file);
		 
		 // This will not be executed if an exception is thrown
		 System.out.println("Hello there!");
	}

}
