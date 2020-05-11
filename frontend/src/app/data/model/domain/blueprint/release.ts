import { Size } from '@model/domain/blueprint/size';
import { Skill } from '@model/domain/blueprint/skill';
import { Component } from '@model/domain/component/component';
import { Uuid } from '@model/shared/uuid';

export interface Release {
  id: Uuid;
  tag: string;
  date: Date;
  changelog: string | null;
  requirements: {
    skills: Skill[];
    components: { quantity: number, component: Component }[]
  };
  size: Size;
  photos: string[];
}
