package connector;
import java.sql.*;
import java.util.Scanner;
import java.io.*;

public class Main {
	public static void main(String [] args) throws Exception
	{
		try {
			Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/ctaDatabase","root","databaseclass");
			
			Statement stmt=con.createStatement();

			
			// APP
			//QUERIES
		
			
						
			String queries = 
					"[1]: Display the employee position who gets paid hourly and has a start date before 04/18/1994\"" + 
					"\n[2]: List the bus stop ids and cross street whose on street is michigan in ascending order.\"" +
					"\n[3]: Display the employee names & the department they work in that has a wage that is not hourly and works in rail operations.\""+
					"\n[4]: Find the Phone # of Employees and IDs whose position is “Security Specialist”"+
					"\n[5]: Display the map ID of stations who have North OR South bound trains.\"" +
					"\n[6]: Print out the stop name from train that has the id of '30278'\"" +
					"\n[7]: Give the distinct Map ID and station names that have the Red Line\""+
					"\n[8]: Display the phone number and extension of the 'Technology' Department\""+
					"\n[9]: Show the average hourly salary of employees form Income under $30.0\"" +
					"\n[10]: Show the count of total employees that work for the CTA.\"" +
					"\n[11]: Find the Blue Line stops whose who run West. \"" +
					"\n[12]: Print name and position title of employees that make over 100K year.\"" +
					"\n[13]: Count the number of employees who are in the rail operations department whose position is “combined rail operators”.\""+
					"\n[14]: Show the employee's wage and ID that make over $30 an hour in descending order.\"" +
					"\n[15]: Display the names of the employees with department title “Bus Maintenance” with salaries higher than the average of salaries for employees in department “Train Maintenance” in descending salary order.";

			System.out.println(queries);
			System.out.println();
			Scanner fScanner = new Scanner(System.in); 
			
			System.out.println("Enter a number between 1 - 10 (OR ENTER 0 TO ESCAPE): ");
			int num = fScanner.nextInt();
			System.out.println();
			
			while(num != 0)
			{
				if(num==1)
				{
					ResultSet rs1 = stmt.executeQuery("SELECT E.ID as ID, E.Position as Position, E.StartYear as StartYear\n" + 
							"FROM Employee AS E\n" + 
							"WHERE StartYear = '1994';");	
					while (rs1.next()) {			
						String a = rs1.getString("ID");
						String b = rs1.getString("Position");
						String c =rs1.getString("StartYear");
						System.out.print(a + " ");
						System.out.print(b + " ");
						System.out.println(c);
					}
				}
				else if(num == 2)
				{
					ResultSet rs2 = stmt.executeQuery("SELECT B.Stop_ID as Stop_ID, B.Cross_Street as Cross_street\n" + 
							"FROM BusStops AS B\n" + 
							"WHERE B.On_Street = 'MICHIGAN'\n" + 
							"ORDER BY B.Stop_ID ASC;");
					while (rs2.next()) {
						
						int a = rs2.getInt("Stop_ID");
						String b = rs2.getString("Cross_Street");
						System.out.print(a + "  ");
						System.out.println(b);
					}
				}
				else if(num == 3)
				{
					ResultSet rs3 = stmt.executeQuery("SELECT I.E_ID as E_ID, I.Wage as Wage\n" + 
							"FROM Income AS I\n" + 
							"WHERE I.Wage > 5000.00\n" + 
							"ORDER BY I.Wage DESC;");
					while (rs3.next()) {
						
						long a = rs3.getLong("E_ID");
						String b = rs3.getString("Wage");
						System.out.print(a + "  ");
						System.out.println(b);
					}
				}
				else if(num == 4)
				{
					ResultSet rs4 = stmt.executeQuery("SELECT E.ID as ID, E.PhoneNumber as PhoneNumber\n" + 
							"FROM Employee AS E\n" + 
							"WHERE E.Position = 'Security Specialist';");
					while (rs4.next()) {
						
						String a = rs4.getString("ID");
						String b = rs4.getString("PhoneNumber");
						System.out.print(a + "  ");
						System.out.println(b);
					}
				}
				else if(num == 5)
				{
					ResultSet rs5 = stmt.executeQuery("SELECT DISTINCT T.Map_ID as Map_ID\n" + 
							"FROM Train_Stops AS T\n" + 
							"WHERE T.Direction = 'N' OR T.Direction = 'S';");
					while (rs5.next()) {
						String a = rs5.getString("Map_ID");
						System.out.println(a);
					}
				}
				else if(num == 6)
				{
					ResultSet rs6 = stmt.executeQuery("SELECT T.Stop_name AS StopName\n" + 
							"FROM Train_Stops AS T\n" + 
							"WHERE T.Stop_ID = 30278;");
					while (rs6.next()) {
						String a = rs6.getString("StopName");
						System.out.println(a);
					}
				}
				else if(num == 7)
				{
					ResultSet rs7 = stmt.executeQuery("SELECT DISTINCT T.Map_ID as MapID, T.Stop_name as StopName\n" + 
							"FROM Train_Stops AS T\n" + 
							"WHERE T.Color_Red = 'TRUE';");
					while (rs7.next()) {
						String a = rs7.getString("MapID");
						String b = rs7.getString("StopName");
						System.out.print(a + "  ");
						System.out.println(b);
					}
				}
				else if(num == 8)
				{
					ResultSet rs8 = stmt.executeQuery("SELECT D.PhoneNum AS PhoneNumber, D.Phone_ext AS Phone_Ext\n" + 
							"FROM Department AS D\n" + 
							"WHERE D.Name = 'Technology';");
					while (rs8.next()) {
						String a = rs8.getString("PhoneNumber");
						String b = rs8.getString("Phone_Ext");
						System.out.print("PhoneNumber:" + a + "  ");
						System.out.println("Extention: " + b);
					}
				}
				else if(num == 9)
				{
					ResultSet rs9 = stmt.executeQuery("SELECT AVG(I.Wage) AS AveHR_Salary\n" + 
							"FROM Income as I\n" + 
							"WHERE  I.Wage < 30.00;");
					while (rs9.next()) {
						String a = rs9.getString("AveHR_Salary");
						System.out.println("AveHR_Salary under $30.00:" + a);
					}
				}
				else if(num == 10)
				{
					ResultSet rs10 = stmt.executeQuery("SELECT COUNT(E.ID) AS Count\n" + 
							"FROM Employee as E;");
					while (rs10.next()) {
						int a = rs10.getInt("Count");
						System.out.print("Total employees working for the CTA: " + a);
					}
				}
				else if(num == 11)
				{
					ResultSet rs11 = stmt.executeQuery("SELECT  T.Stop_name AS StopNameWest\n" + 
							"FROM Train_Stops AS T\n" + 
							"WHERE T.Direction = 'W';");
					while (rs11.next()) {
						String a = rs11.getString("StopNameWest");
						System.out.println("Blue line StopName West: " + a);
					}
				}
				else if(num == 12)
				{
					ResultSet rs12 = stmt.executeQuery("SELECT E.Name as Name\n" + 
							"FROM Employee AS E\n" + 
							"WHERE E.ID = ALL (SELECT I.E_ID\n" + 
							"			  FROM Income AS I\n" + 
							"              Where I.Wage > 100000);");
					while (rs12.next()) {
						String a = rs12.getString("Name");
						System.out.println(a);
					}
				}
				else if(num == 13)
				{
					ResultSet rs13 = stmt.executeQuery("SELECT Count(E.Name) AS Count\n" + 
							"FROM Employee As E\n" + 
							"WHERE E.D_Name = 'Rail Operations' AND E.Position = 'Combined Rail Operators'; ");
					while (rs13.next()) {
						String a = rs13.getString("Count");
						System.out.println("Count: " + a);
					}
				}
				else if(num == 14)
				{
					ResultSet rs14 = stmt.executeQuery("SELECT I.E_ID AS EID, I.Wage as Wage\n" + 
							"FROM Income AS I\n" + 
							"WHERE I.Wage > 5000;");
					while (rs14.next()) {
						String a = rs14.getString("EID");
						String b = rs14.getString("Wage");
						System.out.println("Employee ID making over $30.00: " + a + "  ");
						System.out.println("Wage: " + b);
					}
				}
				else if(num == 15)
				{
					ResultSet rs15 = stmt.executeQuery("SELECT E.Name AS Name\n" + 
							"FROM Employee AS E, Income AS I\n" + 
							"WHERE E.ID = I.E_ID AND E.D_Name = 'Bus Maintenance' AND I.Wage >"
							+ "( SELECT AVG(I.Wage)\n" + 
							"         FROM Employee AS E, Income AS I\n" + 
							"         WHERE E.ID = I.E_ID AND E.D_Name = 'Train Maintenance');");
					while (rs15.next()) {
						String a = rs15.getString("Name");
						System.out.println(a);
					}
				}
				
				System.out.println();
				System.out.println("Enter a number between 1 - 10 (OR ENTER 0 TO ESCAPE): ");
				num = fScanner.nextInt();
				System.out.println();
			}
			
			System.out.println();
			System.out.println("THANK YOU! :)");
			
			
			//INSERTING DATA: 
			//Boolean ret = stmt.execute(sql);
			/*
			Scanner fScanner = new Scanner(new File("Employee1.csv"));
			
			ResultSet rs1 = stmt.executeQuery("select * from Employee");
			int i=0;
			
			String linex = fScanner.nextLine();
			while(fScanner.hasNextLine())
			{	
				String line = fScanner.nextLine();
				
				String [] arr = line.split(",");
				
				ResultSet rs3 = stmt.executeQuery("SET FOREIGN_KEY_CHECKS=0;");

				String sql = "Insert Into Employee Value(\""+arr[0]+"\",\""+ arr[1]+"\",\" "+arr[2]+"\", \""+arr[3]+"\",\" "+arr[4]+"\", \""+arr[5]+"\",\" "+arr[6]+"\", \""+arr[7]+"\",\" "+arr[8]+"\")";
				System.out.println(sql);
							
				Boolean ret = stmt.execute(sql);
				
				i++;
			}
			System.out.println(i);
			*/
			
			/*
			Scanner fScanner = new Scanner(new File("Department1.csv"));
			ResultSet rs2 = stmt.executeQuery("select * from Department");
			int i= 0;
			String linex = fScanner.nextLine();
			
			while(fScanner.hasNextLine())
			{
				String line = fScanner.nextLine();
				
				String [] arr = line.split(",");
				
				//ResultSet rs3 = stmt.executeQuery("SET FOREIGN_KEY_CHECKS=0;");

				String sql = "Insert Into Department Value(\""+arr[0]+"\",\""+ arr[1]+"\",\" "+arr[2]+"\", \""+arr[3]+"\",\" "+arr[4]+"\", \""+arr[5]+"\",\" "+arr[6]+"\")";
				System.out.println(sql);
				
				Boolean ret = stmt.execute(sql);
				
				i++;
			}
			System.out.println(i);
			*/
			
			/*
			Scanner fScanner = new Scanner(new File("Income1.csv"));
			ResultSet rs33 = stmt.executeQuery("select * from Income");
			int i = 0;
			String linex = fScanner.nextLine();

			while(fScanner.hasNextLine())
			{
				String line = fScanner.nextLine();
				
				String [] arr = line.split(",");
				
				double num = Double.parseDouble(arr[1]);
				
				ResultSet rs3 = stmt.executeQuery("SET FOREIGN_KEY_CHECKS=0;");

				String sql = "Insert Into Income Value(\""+arr[0]+"\","+ num+");";
				System.out.println(sql);
				
				Boolean ret = stmt.execute(sql);
				
				i++;
			}
			System.out.print(i);
			 */
			/*
			
			Scanner fScanner = new Scanner(new File("Bus1.csv"));
			int i=0;
			ResultSet rs4 = stmt.executeQuery("select * from BusStops");
			String linex = fScanner.nextLine();
			
			while(fScanner.hasNextLine())
			{
				String line = fScanner.nextLine();
				
				String [] arr = line.split(",");
				int num = Integer.parseInt(arr[0]);
				
				ResultSet rs3 = stmt.executeQuery("SET FOREIGN_KEY_CHECKS=0;");

				String sql = "Insert Into BusStops Value(\""+num+"\",\""+ arr[1]+"\",\" "+arr[2]+"\", \""+arr[3]+"\",\" "+arr[4]+"\")";
				System.out.println(sql);
				
				Boolean ret = stmt.execute(sql);
				
				i++;
			}
			System.out.print(i);
			*/
			
			/*
			Scanner fScanner = new Scanner(new File("Train1.csv"));
			int i =0;
			ResultSet rs5 = stmt.executeQuery("select * from Train_Stops");
			String linex = fScanner.nextLine();
			
			while(fScanner.hasNextLine())
			{
				String line = fScanner.nextLine();
				
				String [] arr = line.split(",");
				
				int num = Integer.parseInt(arr[0]);
				int num2 = Integer.parseInt(arr[3]);
				
				ResultSet rs3 = stmt.executeQuery("SET FOREIGN_KEY_CHECKS=0;");

				String sql = "Insert Into Train_Stops Value(\""+num+"\",\""+ arr[1]+"\",\" "+arr[2]+"\", \""+num2+"\",\" "+arr[4]+"\", \""+arr[5]+"\", \""+ arr[6]+"\",\""+ arr[7]+"\",\""+ arr[8]+"\")";
				System.out.println(sql);
				
				Boolean ret = stmt.execute(sql);
				
				i++;
			}
			System.out.print(i);
			
			*/
			
			
			//QUERIES
			/*
			ResultSet rs1 = stmt.executeQuery("select Count(E.Name) as name from Employee AS E where E.D_Name = \"Bus Operations\";");
			while (rs1.next()) {
				int count = rs1.getInt("name");
				System.out.println(count);
			}
			*/
			con.close();
			
		}catch(Exception e) {
			System.out.println(e);
		}
		
	}

}
