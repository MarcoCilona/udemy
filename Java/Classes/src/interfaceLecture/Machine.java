package interfaceLecture;

/**
 * We are implementing the interface we need. When doing so we are forced to override all its methods.
 * @author Marco
 *
 */
public class Machine implements Info{
	
	private int id = 7;
	
	public void start () {
		System.out.println("Machine is running!");
	}

	@Override
	public void showInfo() {
		// TODO Auto-generated method stub
		System.out.println("Machine ID is: " + id);
	}
}
