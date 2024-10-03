# Use the official Node.js image
FROM node:18

# Set the working directory
WORKDIR /usr/src/app

# Copy package.json and package-lock.json
COPY package*.json ./

# Install React dependencies
RUN npm install

# Copy the rest of the application
COPY . .

# Build the React application
RUN npm run dev

# Expose port 3000
EXPOSE 3000

# Start the React application
# CMD ["npm", "start"]