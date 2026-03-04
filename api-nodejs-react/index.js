const Joi = require('joi');
const express = require("express");
const app = express();

app.use(express.json());

const courses = [
    { id: 1, name: "sarah" },
    { id: 2, name: "sasha" },
    { id: 3, name: "sam" }
];

app.get("/", (req, res) => {
    res.send("Hello, World!");
});

app.get("/api/courses", (req, res) => {
    res.send(courses);
});

app.post('/api/courses', (req, res) => {
    const schema = Joi.object({
        name: Joi.string().min(3).required()
    });


    const { error } = schema.validate(req.body); // Updated validation syntax

    if (error)  return res.status(400).send(error.details[0].message); // Send the specific error message
    

    const course = {
        id: courses.length + 1,
        name: req.body.name
    };
    courses.push(course);
    res.send(course);
        });

app.get("/api/courses/:id", (req, res) => {
    const course = courses.find(c => c.id === parseInt(req.params.id));
    if (!course) return res.status(404).send("The course with the given id was not found.");
        
    res.send(course);
});


app.put('/api/courses/:id', (req, res) => {

    const course = courses.find(c => c.id === parseInt(req.params.id));
    if (!course) return res.status(404).send("The course with the given id was not found.");
            

    const {error} = validateCourse(req.body); //result.error
    if (error) return res.status(400).send(error.details[0].message); 
    

    //update course
    course.name = req.body.name;
    res.send(course);
    
    
});

function validateCourse(course) {
    const schema = Joi.object({
        name: Joi.string().min(3).required()
    });

    //validate the course
    return schema.validate(course);

}

app.delete('/api/courses/:id', (req, res) => {

const course = courses.find(c => c.id === parseInt(req.params.id));
if (!course) return res.status(404).send("The course with the given id was not found.");
    


// delete
const index = courses.indexOf(course);
courses.splice(index,1);


// return same course
res.send(course);

});







// Port
const port = process.env.PORT || 3000;

app.listen(port, () => console.log(`Listening to port ${port}...`));
