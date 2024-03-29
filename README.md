1. **Install Composer Dependencies:**
   - Run the following command in your terminal:
     ```
     composer install
     ```

2. **Compile Assets with NPM:**
   - Open a new terminal window and run:
     ```
     npm run dev
     ```

3. **Copy Environment Configuration:**
   - Copy the `.env.example` file to `.env`:
     ```
     cp .env.example .env
     ```

4. **Run Database Migrations and Seed:**
   - Execute the following command in your terminal:
     ```
     php artisan migrate:fresh --seed
     ```

5. **Register a User:**
   - Visit your application in the browser and navigate to the registration page.
   - Fill in the required details to register a new user.

6. **Login:**
   - After successfully registering, navigate to the login page.
   - Enter the credentials of the registered user to log in.
