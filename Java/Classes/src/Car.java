/**
 * Car is derived from Machine. Inherits from Machine
 * @author Marco
 *
 */
public class Car extends Machine{
	
	/**
	 * Overriding a parent method.
	 * @Override is used to check if we are actually overriding an existing method in the parent class.
	 */
	@Override
	public void start() {
		System.out.println("Car started!");
	}
	
	@Override
	public void stop() {
		System.out.println("Car has stopped!");
	}

	public void wipeWindShield() {
		System.out.println("Wiping windshield.");
	}
}
