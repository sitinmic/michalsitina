-- CREATE TABLE IF NOT EXISTS users (
-- userId int(8) PRIMARY KEY ,
--   userName varchar(20) NOT NULL,
--   password varchar(20) NOT NULL,
--   firstName varchar(20) NOT NULL,
--   lastName varchar(20) NOT NULL,
--   role varchar (10) NOT NULL,
--   email VARCHAR(30) NOT NULL
-- );

CREATE TABLE IF NOT EXISTS plots (
	plot_Id varchar(8) NOT NULL UNIQUE,
	ep_plot_Id varchar(100)  PRIMARY KEY,
	exploratory varchar(100) NOT NULL,
	latitude FLOAT NOT NULL,
	longitude FLOAT NOT NULL,
	landuse VARCHAR(100) NOT NULL
	 
);

CREATE TABLE IF NOT EXISTS species (
	lat_sci_name varchar(100) PRIMARY KEY,
	eng_name varchar(300),
	ger_name varchar(300),
	kinkdom varchar(100) NOT NULL,
	phylum varchar(100) NOT NULL,
	classes VARCHAR(100) NOT NULL,
	orders VARCHAR(100) NOT NULL,
	family VARCHAR(100) NOT NULL,
	genus varchar(100) NOT NULL
  );
  
  CREATE TABLE IF NOT EXISTS forest (
	usefulep_plot_Id varchar(100),
	years int(4),
	layer varchar(100),
	species varchar(100) NOT NULL,
	cover varchar(100) NOT NULL,
	ep_plot_Id VARCHAR(100) NOT NULL,
	PRIMARY KEY (years,layer,species,ep_plot_Id),
	FOREIGN KEY (ep_plot_Id) REFERENCES plots(ep_plot_Id),
	FOREIGN KEY (species) REFERENCES species(lat_sci_name)
	
  ); 
  
  CREATE TABLE IF NOT EXISTS grassland(
	plot_Id varchar(100),
	years int(4),
	ep_plot_Id varchar(100),
	usefulep_plot_Id varchar(100),
	species varchar(100),
	cover float,
	PRIMARY KEY (years,ep_plot_Id,species),
	FOREIGN KEY (ep_plot_Id) REFERENCES plots(ep_plot_Id),
	FOREIGN KEY (species) REFERENCES species(lat_sci_name)
  );

  
  