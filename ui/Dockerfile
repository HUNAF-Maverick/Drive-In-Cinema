# Use the official Node.js image
FROM node:18

# Set the working directory
WORKDIR /usr/src/app

# Copy package.json and package-lock.json
COPY package*.json ./

# Install React dependencies
RUN npm install

# Install Next depencencies
RUN yarn install

# Copy the rest of the application
COPY . .

# Expose port 3000
EXPOSE 3000

# Build the React application
CMD ["npm", "run", "dev"]