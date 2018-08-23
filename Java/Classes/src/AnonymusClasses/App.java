package AnonymusClasses;

class Machine {
	
	public void start() {
		System.out.println("Starting machine...");
	}
	
}

public class App {
	
	public static void main(String [] args) {
		
		Machine m1 = new Machine() {
			@Override
			public void start() {
				System.out.println("Camera snapping!");
			}
		};
		
		m1.start();
		
	}
}
