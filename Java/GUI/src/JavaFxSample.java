import javafx.application.Application;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.paint.Color;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;

public class JavaFxSample extends Application {
	
	/**
	 * Steps to follow:
	 * 1. Prepare a scene graph with the required nodes.
	 * 2. Prepare a Scene width the required dimensions and add the scene graph
	 * 3. Prepare a stage and add the scene to the stage and display the contents of the stage
	 * 
	 * The first node to be created is the root node: Group, Region or WebView 
	 */
	@Override
	public void start(Stage primaryStage) throws Exception {

		Rectangle rt = new Rectangle();
		
		rt.setX(250.0f);
		rt.setY(125.0f);
		rt.setWidth(100);
		rt.setHeight(50);		

		// Create a Group Object
		Group root = new Group(rt);
		
		//root.getChildren().add(rt);
				
		/**
		 * Creating a Scene Object.
		 * It takes the Group object and also two additional
		 * parameters representing the width and height
		 */
		Scene scene = new Scene(root, 600, 300, Color.BLACK);
		
		// Setting color to the scene
		scene.setFill(Color.BLUE);
				
		// Setting the title to Stage
		primaryStage.setTitle("Sample Application");
		
		// Adding the scene to Stage
		primaryStage.setScene(scene);
		
		// Displaying the contents of the stage
		primaryStage.show();
		
		
		
	}
	
	public static void main(String args[]) {
		
		/**
		 * This method is used to launch the application.
		 * This method internally calls the start() method
		 * of the Application class.
		 */
		launch(args);
	}

}
